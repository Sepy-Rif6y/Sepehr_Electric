<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // لیست کاربران
    public function Users_List(){
        $per_page = request()->Per_Page ?? 10;
        $Search = request()->UserSearch ?? '';
        $users = user::whereRaw("(username like '%$Search%' or realname like '%$Search%')")->where('status' , 0)->orderby('id','desc')->paginate($per_page);
        $not_found = '';
        if(count($users) == 0){
            $not_found = "کاربری با این مشخصات یافت نشد";
        }
        $data = [
            'users' => $users,
            'title' => ' - لیست کاربران',
            'message' => $not_found
        ];
        return view("Admin_Template.Main_Contents.User.Users_List",$data);
    }

    // افزودن کاربر
    public function User_Add(){
        $data = [
            'title' => ' - افزودن کاربر'
        ];
        return view("Admin_Template.Main_Contents.User.User_Add",$data);
    }

    // عملیات ثبت کاربر
    public function UserAddValidation(){
        $RealName = request()->EntryRealName;
        $UserName = request()->EntryUserName;
        $Password = request()->EntryPassword;
        $RePassword = request()->EntryRePassword;
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
            $user->password = Hash::make($RePassword);
            if(request()->IsAdmin){
                $user->status = request()->IsAdmin;
            }
            $user->save();
            $data = [
                'status' => 'success',
                'message' => 'کاربر با موفقیت اضافه شد'
            ];
            // رفتن به صفحه لیست کاربران
            return redirect(route('Users-List'))->with($data);
        }

        //ارسال پیام ها و اطلاعات تولید شده در آرایه
        $data = [
            "UserName_Error" => "$User_Error" ,
            "Password_Error" => "$Password_Error" ,
            "RePassword_Error" => "$Repassword_Error",
        ];

        // بازگشت به صفحه قبلی و ارسال اطلاعات لازم
        return redirect()->back()->with($data);
    }

    // تغییر وضعیت کاربر
    public function Change_Status($id){
        $user = user::findOrFail($id);
        if($user->status){
            $user->status = 0;
        }else{
            $user->status = 1;
        }
        $user->save();
        $data = [
            'status' => 'success',
            'message' => 'وضعیت کاربر با موفقیت تغییر کرد'
        ];
        return redirect(route('Users-List'))->with($data);
    }

    // ویرایش اطلاعات کاربر
    public function User_Edit($id){
        $user_info = user::findOrFail($id);
        $data = [
            'title' => ' - ویرایش کاربر',
            'user_info' => $user_info
        ];
        return view("Admin_Template.Main_Contents.User.User_Edit",$data);
    }

    // اعتبار سنجی ویرایش کاربر
    public function UserEditValidation(){
        // دریافت اطلاعات لازم
        $id = request()->id;
        $realname = request()->EntryRealName;
        $username = request()->EntryUserName;
        $password = request()->EntryPassword;
        $lastrealname = request()->lastrealname;
        $lastusername = request()->lastusername;
        $lastpassword = request()->lastpassword;
        $PasswordError = $error = "";
        $edit = true;
        $change = "";
        $user_match = user::where('username',$username)->first();
        // تشخیص وجود نام کاربری در دیتا بیس
        $user_match_a = [
            'user_match' => $user_match
        ];
        if($user_match){
            if($user_match_a['user_match']['username'] != $lastusername){
                $edit = false;
                $error = "این نام کاربری قبلا ثبت شده است";
            }
        }
        // تشخیص درستی رمز های وارد شده و تولید پیام
        if($password){
            if(strlen($password) < 4){
                $PasswordError = "رمز باید حداقل چهار رقم باشد";
                $edit = false;
            }
        }
        // تشخیص صلاحیت ویرایش
        if($edit){
            // تشخیص تغییر نام کاربر و تولید پیام
            if($realname != $lastrealname){
                $change .= "<li>" . "نام کاربر از " . $lastrealname . " به " . $realname . " تغییر یافت" . "</li>";
            }
            // تشخیص تغییر نام کاربری و تولید پیام
            if($username != $lastusername){
                $change .= "<li>" . "نام کاربری از " . $lastusername . " به " . $username . " تغییر یافت" . "</li>";
            }
            // تشخیص تغییر رمز و تولید پیام
            if($password){
                if(!Hash::check($password,$lastpassword)){
                    $change .= "<li>" . "رمز کاربر  تغییر یافت" . "</li>";
                }
            }
            // انجام عملیات ویرایش کاربر
            $change_user = user::findOrFail($id);
            $change_user->username = $username;
            $change_user->realname = $realname;
            if($password){
               $change_user->password = Hash::make($password);
            }
            $change_user->save();
        }
        // ارسال اطلاعات در آرایه و رفتن به صفحه قبلی
        $data = [
            'Password_Error' => $PasswordError,
            'Error' => $error,
            'change' => $change
        ];
        return redirect()->back()->with($data);
    }

    // حذف کاربر
    public function User_Delete(){
        user::findOrFail(request()->UserId)->delete();
        $data = [
            'status' => 'success',
            'message' => 'کاربر با موفقیت حذف شد'
        ];
        return redirect()->back()->with($data);
    }
}
