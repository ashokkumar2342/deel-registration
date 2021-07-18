<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Model\BlocksMc;
use App\Model\District;
use App\Model\Village;
use App\Student;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest')->except('logout');
    }

    public function index(){
        return redirect()->route('admin.login');
        
    }
    
    public function showLoginForm(){
        return view('admin.auth.login');
    }
    
    public function login(Request $request){ 
     
          $this->validate($request, [
              'email' => 'required', 
              'password' => 'required',
              'captcha' => 'required|captcha' 
          ]);
          $admins=Admin::where('email',$request->email)->first();

          $credentials = [
                     'email' => $request['email'],
                     'password' => $request['password'],
                     'status' => 1,
                 ]; 
            if(auth()->guard('admin')->attempt($credentials)) {
                return redirect()->route('admin.dashboard');
            } 

            return Redirect()->back()->with(['message'=>'Invalid User or Password','class'=>'error']); 
        
       
    }

    public function refreshCaptcha()
    {  
        return  captcha_img('math');
    }
    

    public function logout()
    {
        $this->guard()->logout();
        return redirect()->route('admin.login');
    }
    
    // defining auth  guard
    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function forgetPassword()
    {
        return view('admin.auth.forget_password');
    }
    public function forgetPasswordSendLink(Request $request)
    {
        $AppUsers=new Admin();
        $u_detail=$AppUsers->getdetailbyemail($request->email);
        $up_u=array();
        $up_u['token'] = str_random(64);        
        $AppUsers->updateuserdetail($up_u,$u_detail->user_id);      
        $up_u['name']=$u_detail->name;
        $up_u['email']=$u_detail->email;
        $user=$u_detail->email;
        // $up_u['otp']=$up_u['otp'];
        $up_u['logo']=url("img/logo.png");
        $up_u['link']=url("passwordreset/reset/".$up_u['token']);


        Mail::send('emails.forgotPassword', $up_u, function($message){
                   $message->to('ashok@gmail.com')->subject('Password Reset');
               });
                       
        // $mailHelper = new MailHelper();
        // $mailHelper->forgetmail($request->email); 
        $response=array();
        $response['status']=1;
        $response['msg']='Reset Link Sent successfully';
        return $response;

    }
    
}
