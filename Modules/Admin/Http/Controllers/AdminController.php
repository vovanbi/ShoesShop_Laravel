<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use App\Models\Rating;
use App\Models\Transaction;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $ratings = Rating::with('product:id,pro_name','user:id,name')->limit(10)->get();
        $contacts = Contact::limit(10)->get();

        //doanh thu ngay
        $moneyDay = Transaction::whereDay('updated_at',date('d'))
            ->where('tr_status',Transaction::STATUS_DONE)
            ->sum('tr_total');
        //doanh thu thang
        $moneyMonth = Transaction::whereMonth('updated_at',date('m'))
            ->where('tr_status',Transaction::STATUS_DONE)
            ->sum('tr_total');
        $moneyYear = Transaction::whereYear('updated_at',date('Y'))
            ->where('tr_status',Transaction::STATUS_DONE)
            ->sum('tr_total');
        $dataMoney = [
            [
                "name" => "Doanh thu ngày",
                "y" => (int)$moneyDay
            ],
            [
                "name" => "Doanh thu tháng",
                "y" => (int)$moneyMonth
            ],
            [
                "name" => "Doanh thu năm",
                "y" => (int)$moneyYear
            ],
        ];
        //danh sach don hang moi
        $transactionNews = Transaction::with('user:id,name')
            ->limit(5)->orderByDesc('id')->get();
        $viewData= [
            'ratings' => $ratings,
            'contacts' => $contacts,          
            'dataMoney' => json_encode($dataMoney),
            'transactionNews' => $transactionNews,
        ];
        return view('admin::index',$viewData);
    }
}
