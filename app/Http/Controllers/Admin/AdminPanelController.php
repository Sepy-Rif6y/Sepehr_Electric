<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminProfileEditRequest;
use App\Models\User;
use App\Models\category;
use App\Models\Factory;
use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminPanelController extends Controller
{
    // ورود به پنل ادمین
    public function index(){
        // شمارش تعداد دسته بندی ها
        $Categories = category::all();
        // شمارش تعداد کارخانه ها
        $Factories = Factory::all();
        // شمارش تعداد مدیران
        $Admins = user::where('status',1) ->get();
        // شمارش تعداد کاربران
        $Users = user::all();
        // شمارش تعداد محصولات
        $Products = product::all();
        // وارد کردن اطلاعات در آرایه و ارسال به صفحه
        $data = [
            'Users' => $Users,
            'Products' => $Products,
            'Admins' => $Admins,
            'Categories' => $Categories,
            'Factories' => $Factories,
            'title' => 'Sepehr Electric'
        ];
        return view("Admin_Template.Main_Contents.Main_Content",$data);
    }

    // صفحه خروج از پنل
    public function Admin_Exit(){
            session()->forget('AdminUserName');
            return redirect(route('Home'));
    }

    // لیست مدیران
    public function Admins_list(){
        // دریافت اطلاعات ادمین
        $Admins = user::where('status',1)->get();
        // وارد کردن اطلاعات در آرایه
        $data = [
            'title' => ' - لیست مدیران',
            'Admins_info' => $Admins
        ];
        // ارسال به صفحه نمایش ادمین ها همراه با اطلاعات
        return view("Admin_Template.Main_Contents.Admins_List",$data);
    }

    // نمایش فرم تایید صلاحیت ادمین
    public function Admin_Profile_Gate_View(){
        return view('Admin_Template.Main_Contents.Admin_Profile_Gate');
    }

    // انجام عملیات تایید صلاحیت ادمین
    public function Admin_Profile_Gate(){
        // دریافت اطلاعات لازم
        $username = Session::get('AdminUserName');
        $entry_password = request('password');
        $Check_Admin = User::where('username',$username)->first();
        $fond_password = $Check_Admin->password;
        // تشخیص درست بودن رمز
        if(Hash::check($entry_password,$fond_password)){
            $data = [
                'title' => ' - اطلاعات ادمین'
            ];
            return redirect(route('Admin-Profile'))->with($data);
        }else{
            $data = [
                'Message' => 'رمز وارد شده اشتباه است'
            ];
            session()->forget('AdminUserName');
            return redirect(route('LogIn'))->with($data);
        }
    }

    // نمایش اطلاعات ادمین در فرم قابل ویرایش
    public function Admin_Profile(){
        $Admin_found = User::where('username',Session::get('AdminUserName'))->first();
        $data = [
            'title' => ' - اطلاعات ادمین',
            'Admin_info' => $Admin_found
        ];
        return view('admin_template.main_contents.admin_profile',$data);

    }

    // اعتبار سنجی و ثبت اطلاعات ویرایش شده ادمین
    public function Admin_Profile_Edit(AdminProfileEditRequest $request){
        // دریافت اطلاعات لازم
        $id = request()->id;
        $LastRealName = request()->LastRealName;
        $lastUserName = request()->lastUserName;
        $LastPassword = request()->LastPassword;
        $EntryRealName = request()->realname;
        $EntryUserName = request()->username;
        $EntryPassword = request()->password;
        $EntryRePassword = request()->password_confirmation;
        $PasswordError = $error = $change = "";
        $edit = true;
        // تشخیص وجود نام کاربری در دیتا بیس
        $username_match = user::where('username',$EntryUserName)->first();
        $username_match_check = [
            'username_match' => $username_match
        ];
        if($username_match){
            if($username_match_check['username_match']['username'] != $lastUserName){
                $edit = false;
                $error = "این نام کاربری قبلا ثبت شده است";
            }
        }
        // تشخیص درستی رمز های وارد شده و تولید پیام
        if($EntryPassword){
            if(strlen($EntryPassword) < 4){
                $edit = false;
                $PasswordError = "رمز باید حداقل چهار رقم باشد";
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
            session(['AdminUserName'=>$EntryUserName]);

        }
        // ارسال اطلاعات در آرایه و رفتن به صفحه قبلی
        $data = [
            'Password_Error' => $PasswordError,
            'error' => $error,
            'change' => $change
        ];
        return redirect()->back()->with($data);
    }

}
