<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user:id,name')->paginate(10);
        $viewData = [
            'transactions' => $transactions
        ];
        return view('admin::transaction.index', $viewData);
    }
    public function viewOrder(Request $request,$id)
    {
        if ($request->ajax())
        {
            $orders = Order::with('product')->where('or_transaction_id',$id)->get();
            $html = view('admin::components.order',compact('orders'))->render();
            return \response()->json($html);
        }
    }
    //xu ly trang thai don hang
    public function actionTransaction($id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::where('or_transaction_id',$id)->get();
         if($orders)
         {
             //tru di so luong san pham
             //tang bien pay san pham
             foreach ($orders as $order)
             {
                 $product = Product::find($order->or_product_id);
                 $product->pro_number = $product->pro_number - $product->or_qty;
                 $product->pro_pay ++;
                 $product->save();
             }
         }
         //update pay user
        \DB::table('users')->where('id',$transaction->tr_user_id)->increment('total_pay');
         $transaction->tr_status = Transaction::STATUS_DONE;
         $transaction->save();
         return redirect()->back()->with('success','Xử lý đơn hàng thành công');

        //cap nhat trang thai don hang
    }
    public function action($action,$id)
    {
        if($action)
        {
            $transaction = Transaction::find($id);
            switch ($action)
            {
                case 'delete':
                    $transaction->delete();
                    break;
            }
        }
        return redirect()->back();
    }

}
