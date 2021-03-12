<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }
    public function postRegister(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        if($user->id)
        {
            $email = $user->email;
            $code = bcrypt(md5(time().$email));
            $url = route('user.verify.account',['id' => $user->id,'code' => $code]);

            $user->code_active = $code;
            $user->time_active = Carbon::now();
            $user->save();
            $data = [
                'route' => $url
            ];

            Mail::send('email.verify_account', $data, function($message) use ($email){
                $message->to($email,'Xác nhận mật khẩu')->subject('Xác nhận mật khẩu');
            });
            return redirect()->route('get.login');
        }
        return redirect()->back();

    }
    //Xac nhan tai khoan
    public function verifyAccount(Request $request)
    {
        $code = $request->code;
        $id = $request->id;
        $checkUser = User::where([
            'code_active' => $code,
            'id' => $id
        ])->first();
        if(!$checkUser)
        {
            return redirect('/')->with('danger','Xin lỗi ! Đường dẫn xác nhận tài khoản không tồn tại, bạn vui lòng thử lại sau.');
        }
        $checkUser->active = 2;
        $checkUser->save();
        return redirect('/')->with('success','Xác nhận tài khoản thành công');

    }
}
