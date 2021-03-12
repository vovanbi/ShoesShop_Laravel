<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;

class UserController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $user = User::find(get_data_user('web'));
        $transactions = Transaction::where('tr_user_id',get_data_user('web'))->get();
        $totalTransaction = Transaction::where('tr_user_id',get_data_user('web'))->select('id')->count('id');
        $totalTransactionDone = Transaction::where([
            ['tr_user_id',get_data_user('web')],
            ['tr_status',Transaction::STATUS_DONE],
        ])->select('id')->count('id');
        $viewData = [
            'totalTransaction' => $totalTransaction,
            'totalTransactionDone' => $totalTransactionDone,
            'transactions' => $transactions,
            'user' => $user
        ];
        return view('user.index',$viewData);
    }
    public function saveUpdateInfo(Request $request)
    {
        $user = User::where('id',get_data_user('web'))
            ->update($request->except('_token'));
        return redirect()->back()->with('success','Sửa thông tin thành công');
    }
}
