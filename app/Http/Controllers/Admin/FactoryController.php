<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Factory;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class FactoryController extends Controller
{
    //لیست کارخانه ها
    public function Factories_List(){
        $per_page = request()->Per_Page ?? 10;
        $Search = request()->FactorySearch ?? '';
        // دریافت کارخانه ها
        $Factories = Factory::whereRaw("factory_title like '%$Search%'")->orderBy('id','desc')->paginate();
        $data = [
            'title' => ' - لیست کارخانه ها',
            'Factories' => $Factories
        ];
        return view('Admin_Template.Main_Contents.Factory.Factories_List',$data);
    }

    // صفحه افزودن کارخانه
    public function Factory_Add(){
        $data = [
            'title' => ' - افزودن کارخانه'
        ];
        return view('Admin_Template.Main_Contents.Factory.Factory_Add',$data);
    }

    // ثبت کارخانه
    public function FactoryAddValidation(){
        $FactoryTitle = request()->EntryFactoryTitle;
        $match = Factory::where('factory_title',$FactoryTitle)->first();
        $FactoryTitleError = "";
        if(!$match){
            if(mb_strlen($FactoryTitle) < 3){
                $FactoryTitleError = "نام کارخانه نمیتواند کمتر از سه حرف باشد";
            }else{
                $Factory = new Factory();
                $Factory->factory_title = $FactoryTitle;
                $Factory->save();
                $data = [
                    'status' => 'success',
                    'message' => 'کارخانه با موفقیت اضافه شد'
                ];
                return redirect(route('Factories-List'))->with($data);
            }
        }else{
            $FactoryTitleError = "این کارخانه قبلا ثبت شده است";
        }
        $data = [
            'FactoryTitleError' => $FactoryTitleError,
        ];
        return redirect()->back()->with($data);

    }

    // صفحه ویرایش کارخانه
    public function Factory_Edit($id){
        $Factory = Factory::findOrFail($id);
        $data = [
            'title' => ' - ویرایش کارخانه',
            'factory_info' => $Factory
        ];
        return view('Admin_Template.Main_Contents.Factory.Factory_Edit',$data);
    }

    // اعتبار سنجی ویرایش کارخانه
    public function FactoryEditValidation(){
        // دریافت اطلاعات لازم
        $id = request()->id;
        $LastFactoryTitle = request()->LastFactoryTitle;
        $EntryFactoryTitle = request()->EntryFactoryTitle;
        $FactoryTitleMessage = $change = "";
        $Error = false;
        // تشخیص صلاحیت ثبت کارخانه
        if(mb_strlen($EntryFactoryTitle) < 3){
            $Error = true;
            $FactoryTitleMessage = "نام کارخانه نمیتواند کمتر از سه حرف باشد";
        }
        $match = Factory::where('factory_title',$EntryFactoryTitle)->first();
        $match_a = [
            'title' => $match
        ];
        if($match){
            if($match_a['title']['factory_title'] != $LastFactoryTitle){
                $Error = true;
                $FactoryTitleMessage = "این کارخانه قبلا ثبت شده است";
            }
        }
        // عملیات ثبت در دیتا بیس
        if(!$Error){
            $change = "نام کارخانه از " . $LastFactoryTitle . " به " . $EntryFactoryTitle . " تغییر کرد";
            $Factory = Factory::findOrFail($id);
            $Factory->factory_title = $EntryFactoryTitle;
            $Factory->save();
        }
        $data = [
            'change' => $change,
            'FactoryTitleMessage' => $FactoryTitleMessage
        ];
        return redirect()->back()->with($data);
    }

    // حذف کارخانه
    public function Factory_Delete(){
        Factory::findOrFail(request()->FactoryId)->delete();
        $data = [
            'status' => 'success',
            'message' => 'کارخانه با موفقیت حذف شد'
        ];
        return redirect()->back()->with($data);
    }
}
