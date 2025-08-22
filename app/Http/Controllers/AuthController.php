<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // انتقال به صفحه ورود کاربر و ارسال تایتل
    public function User_L(){
        $data = [
            'title' => " - ورود" ,
        ];
        return view('Site_Template.Main_Contents.User.User_Login',$data);
    }

    // اعتبار سنجی ورود کاربر
    public function UserValidation(){

        // دریافت اطلاعات لازم
        $Username = request()->UserName;
        $Password = request()->Password;
        $message = "";
        $user = user::where('username',$Username)->first();

        // درستی سنجی اطلاعات وارد شده و تولید پیام
        if($user){
            $UserName = $user->username;
            $password = $user->password;
            if($Username == $UserName){
                if(Hash::check($Password,$password)){
                    $user_id = user::where('username',$Username)->first()->value('id');
                    session([
                        'user_id' => $user_id,
                        'username' => $UserName,
                    ]);
                    return redirect(route('Home'));
                }else{
                    $message = "رمز اشتباه است";
                }
            }
        }else{
            $message = "نام کاربری در سایت ثبت نام نکرده است";
        }

        //ارسال پیام ها و اطلاعات تولید شده در آرایه
        $data = [
            "Message" => "$message",
        ];
        // بازگشت به صفحه قبلی و ارسال اطلاعات لازم
        return redirect()->back()->with($data);
    }

    // انتقال به صفحه ورود ادمین و ارسال تایتل
    public function  Admin_L(){
        $data = [
            'title' => " - ورود ادمین" ,
        ];
        return view('Site_Template.Main_Contents.Admin_Login',$data);
    }

    // اعتبار سنجی ورود ادمین
    public function AdminValidation(){

        // دریافت اطلاعات لازم
        $Username = request()->UserName;
        $Password = request()->Password;
        $message = "ادمینی با این نام وجود ندارد";
        $Login = false;
        $Admin_info = user::where('username',$Username)->first();
        // تشخیص صلاحیت ورود به پنل ادمین
        if($Admin_info){
            $Admin = $Admin_info->status;
            if($Admin){
                $Admin_Password = $Admin_info->password;
                if(Hash::check($Password,$Admin_Password)){
                    $Login = true;
                    session(['AdminUserName' => $Admin_info->username,]);

                }else{
                    $message = "شما اجازه دسترسی ندارید";
                }
            }

        }

        //ارسال پیام ها و اطلاعات تولید شده در آرایه
        $data = [
            "Message" => $message
        ];
        // تعیین مسیر
        if($Login){
            // ورود به پنل ادمین
            return redirect(route('Admin-Panel'));
        }else{
            // بازگشت به صفحه قبلی و ارسال اطلاعات لازم
            return redirect()->back()->with($data);
        }
    }
    // انتقال به صفحه ثبت نام و ارسال تایتل
    public function Register(){
        $data = [
            'title' => " - ثبت نام" ,
        ];

        return view('Site_Template.Main_Contents.User.Register',$data);
    }

    // اعتبار سنجی ثبت نام کاربر
    public function RegisterValidation(){

        // دریافت اطلاعات لازم
        $RealName = request()->RealName;
        $UserName = request()->UserName;
        $Password = request()->Password;
        $RePassword = request()->RePassword;
        $Error = false;
        $User_Error = $Password_Error = $Repassword_Error = "";
        $User_Match = user::where('username',$UserName)->first();

        // سنجش درستی نام کاربری و تولید پیام
        if($UserName == "Admin"){
                $Error = true;
                $User_Error = "این نام کاربری معتبر نمیباشد";
        }
        if($User_Match){
                $Error = true;
                $User_Error = "این نام کاربری قبلا ثبت شده است";
        }

        // سنجش درستی رمز و تولید پیام
        if(strlen($Password) < 4){
                $Error = true;
                $Password_Error = "رمز باید بیشتر از 4 رقم باشد";
        }elseif($Password != $RePassword){
                $Error = true;
                $Repassword_Error = "رمز ها مغایرت دارند";
        }

        // سنجش موفقیت آمیز بودن ثبت نام و تولید پیام و ثبت در دیتا بیس
        if(!$Error){
            $user = new user();
            $user->realname = $RealName;
            $user->username = $UserName;
            $user->password = Hash::make($Password);
            $user->save();
            $user_id = user::where('username',$UserName)->first()->value('id');
            session([
                'user_id' => $user_id,
                'username' => $UserName
            ]);
            return redirect(route('Home'));
        }

        //ارسال پیام ها و اطلاعات تولید شده در آرایه
        $data = [
            "User_Error" => "$User_Error" ,
            "Password_Error" => "$Password_Error" ,
            "Repassword_Error" => "$Repassword_Error",
        ];

        // بازگشت به صفحه قبلی و ارسال اطلاعات لازم
        return redirect()->back()->with($data);
    }

    // انتقال به صفحه ویرایش کاربر
    public function User_Edit($id){
        $user = user::findOrFail($id);
        $data = [
            'title' => ' - ویرایش کاربر',
            'user_info' => $user
        ];
        return view('Site_Template.Main_Contents.User.User_Edit',$data);
    }

    // اعتبار سنجی ویرایش کاربر
    public function UserEditValidation(){
        // دریافت اطلاعات لازم
        $id = request()->id;
        $LastRealName = request()->LastRealName;
        $lastUserName = request()->lastUserName;
        $LastPassword = request()->LastPassword;
        $EntryRealName = request()->EntryRealName;
        $EntryUserName = request()->EntryUserName;
        $EntryPassword = request()->EntryPassword;
        $EntryRePassword = request()->EntryRePassword;
        $LastEntryPassword = request()->LastEntryPassword;
        $PasswordError = $Last_Entry_Password_Error = $RePassword_Error = $error = $change = "";
        $edit = true;
        // تشخیص وجود نام کاربری در دیتا بیس
        $user_match = user::where('username',$EntryUserName)->first();
        $user_match_a = [
            'user_match' => $user_match
        ];
        if($user_match){
            if($user_match_a['user_match']['username'] != $lastUserName){
                $edit = false;
                $error = "این نام کاربری قبلا ثبت شده است";
            }
        }
        // تشخیص درستی رمز های وارد شده و تولید پیام
        if($EntryPassword or $LastEntryPassword){
            if(!Hash::check($LastEntryPassword,$LastPassword)){
                $edit = false;
                $Last_Entry_Password_Error = "رمز وارد شده اشتباه است";
            }elseif(strlen($EntryPassword) < 4){
                $edit = false;
                $PasswordError = "رمز باید حداقل چهار رقم باشد";
            }elseif($EntryPassword != $EntryRePassword){
                $edit = false;
                $RePassword_Error = "رمز ها یکی نیستند";
            }
        }
        // تشخیص صلاحیت ویرایش
        if($edit){
            // تشخیص تغییر نام کاربری و تولید پیام
            if($EntryUserName != $lastUserName){
                $change .= "<li>" . "نام کاربری شما از " . $lastUserName . " به " . $EntryUserName . " تغییر یافت" . "</li>";
            }
            if($EntryPassword){
                // تشخیص تغییر رمز و تولید پیام
                if(!Hash::check($EntryPassword,$LastPassword)){
                        $change .= "<li>" . "رمز شما تغییر یافت" . "</li>";
                    }
                }
                // تشخیص تغییر نام کاربری و تولید پیام
                if($EntryRealName != $LastRealName){
                    $change .= "<li>" . "نام شما از " . $LastRealName . " به " . $EntryRealName . " تغییر یافت" . "</li>";
            }
            // انجام عملیات ویرایش کاربر
            $change_user = user::findOrFail($id);
            $change_user->username = $EntryUserName;
            $change_user->realname = $EntryRealName;
            if($EntryRePassword){
                $change_user->password = Hash::make($EntryRePassword);
            }
            $change_user->save();
            session([
                'user_id' => $id,
                'username' => $EntryUserName,
            ]);
        }
        // ارسال اطلاعات در آرایه و رفتن به صفحه قبلی
        $data = [
            'Password_Error' => $PasswordError,
            'RePassword_Error' => $RePassword_Error,
            'Last_Entry_Password_Error' => $Last_Entry_Password_Error,
            'error' => $error,
            'change' => $change
        ];
        return redirect()->back()->with($data);
    }

    // انتقال به صفحه خروج کاربر
    public function User_Exit(){
        session()->forget('username');
        session()->forget('user_id');
        return redirect(route("Home"));
    }
}
