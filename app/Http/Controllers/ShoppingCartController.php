<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

class ShoppingCartController extends FrontendController
{
    private $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY
    private $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
    private $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    private $vnp_Returnurl = "http://localhost:81/store/public/gio-hang/thanh-toan-online";

    public function __construct()
    {
        parent::__construct();
    }
    //them gio hang
    public function addProduct(Request $request,$id)
    {
        $product = Product::select('pro_name','id','pro_price','pro_sale','pro_avatar','pro_number')->find($id);

        if(!$product) return redirect('/');

        $price = $product->pro_price;
        if($product->pro_sale)
        {
            $price = $price * (100-$product->pro_sale)/100;
        }
        if($product->pro_number == 0)
        {
            return redirect()->back()->with('warning','Sản phẩm đã hết hàng');
        }

        \Cart::add([
            'id'=> $id,
            'name'=> $product->pro_name,
            'qty'=> 1,
            'price'=> $price,
            'weight' => 550,          
            'options'=> [
                'avatar'=> $product->pro_avatar,
                'sale'=> $product->pro_sale,
                'price_old'=> $product->pro_price,    
                'size' =>0          
            ],
        ]);
        return redirect()->back()->with('success','Thêm vào giỏ hàng thành công');
    }

    public function updateProduct(Request $request,$id)
    {
        $qty = $request->qtyPlus;
        $item = \Cart::get($id);
        $option = $item->options->merge(['size' => $request->size]);
        \Cart::update($id,['qty' => $qty,'options' => $option,]);
        return redirect()->back()->with('success','Cập nhật thành công');
    }

    public function deleteProduct($key)
    {
        \Cart::remove($key);
        return redirect()->back()->with('success','Xóa thành công');
    }

    //danh sach gio hang
    public function getListShoppingCart()
    {   
        $products = \Cart::content();
        return view('shopping.index',compact('products'));
    }

    //form thanh toan
    public function getFormPay()
    {
        $products = \Cart::content();
        return view('shopping.pay',compact('products'));
    }

    //luu thong tin gio hang
    public function saveInfoShoppingCart(Request $request)
    {
        $totalMoney = str_replace(',','',\Cart::subtotal(0,3));
        $transactionId = Transaction::insertGetId([
            'tr_user_id' => get_data_user('web'),
            'tr_total' => (int)$totalMoney,
            'tr_note' => $request->note,
            'tr_address' => $request->address,
            'tr_phone' => $request->phone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if ($transactionId)
        {
            $products =\Cart::content();
            foreach ($products as $product)
            {
                Order::insert([
                    'or_transaction_id' => $transactionId,
                    'or_product_id' => $product->id,
                    'or_qty' => $product->qty,
                    'or_price' => $product->options->price_old,
                    'or_sale' => $product->options->sale,
                    'or_size' => $product->options->size,
                ]);
            }
        }
        \Cart::destroy();
        return redirect('/')->with('success','Mua hàng thành công');
    }

    public function showFormPay(Request $request)
    {
        if($request->vnp_ResponseCode=='00')
        {
            $transactionId = Transaction::insertGetId([
                'tr_user_id' => get_data_user('web'),
                'tr_total' => $request->vnp_Amount/100,
                'tr_note' => $request->vnp_OrderInfo,
                'tr_address' => get_data_user('web','address'),
                'tr_phone' => get_data_user('web','phone'),
                'tr_type' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            if ($transactionId)
            {
                $products =\Cart::content();
                foreach ($products as $product)
                {
                    Order::insert([
                        'or_transaction_id' => $transactionId,
                        'or_product_id' => $product->id,
                        'or_qty' => $product->qty,
                        'or_price' => $product->options->price_old,
                        'or_sale' => $product->options->sale,
                        'or_size' => $product->options->size,
                    ]);
                }
                \Cart::destroy();              
                return redirect()->to('/')->with('success','Xác nhận giao dịch thành công');
            }           
            else{
                return redirect()->to('/')->with('danger','Thanh toán không thành công');
            }
        }              
        $products= \Cart::content();
        return view('shopping.pay_online',compact('products'));
    }
    public function savePayOnline(Request $request)
    {
        $totalMoney = str_replace(',','',\Cart::subtotal(0,3));       
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $this->vnp_TmnCode,
            "vnp_Amount" => $totalMoney*100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $_SERVER['REMOTE_ADDR'],
            "vnp_Locale" => $request->language,
            "vnp_OrderInfo" => $request->note ? $request->note : 'Không',
            "vnp_ReturnUrl" => $this->vnp_Returnurl,
            "vnp_TxnRef" => date('YmdHis'),
        );
        if ($request->bank_code) {
            $inputData['vnp_BankCode'] = $request->bank_code;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $this->vnp_Url . "?" . $query;
        if ($this->vnp_HashSecret) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $this->vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        return redirect()->to($returnData['data']);

    }
}
