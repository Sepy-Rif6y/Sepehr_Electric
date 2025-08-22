<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // لیست دسته بندی ها
    public function Categories_List(){
        $per_page = request()->Per_Page ?? 10;
        $Search = request()->CategorySearch ?? '';
        // دریافت اطلاعات
        $Categories = category::whereRaw("category_title like '%$Search%'")->orderBy('id','desc')->paginate();
        $data = [
            'title' => ' - لیست دسته بندی ها',
            'Categories' => $Categories
        ];
        return view('Admin_Template.Main_Contents.Category.Categories_List',$data);
    }

    // صفحه افزودن دسته بندی
    public function Category_Add(){
        $data = [
            'title' => ' - افزودن دسته بندی'
        ];
        return view('Admin_Template.Main_Contents.Category.Category_Add',$data);
    }

    // ثبت دسته بندی در دیتابیس
    public function CategoryAddValidation(){
        // دریافت اطلاعات لازم
        $CategoryTitle = request()->EntryCategoryTitle;
        $CategoryColor = request()->EntryCategoryColor;
        $CategoryTitleError = $CategoryColorError = "";
        $Error = false;
        // تشخیص صلاحیت ثبت عنوان دسته بندی
        $title_match = category::where('category_title',$CategoryTitle)->first();
        if($title_match){
            $Error = true;
            $CategoryTitleError = "این عنوان قبلا ثبت شده است";
        }
        if (mb_strlen($CategoryTitle) < 2){
            $CategoryTitleError = "عنوان دسته بندی نمیتواند از دو حرف کمتر باشد";
            $Error = true;
        }
        // تشخیص صلاحیت ثبت رنگ دسته بندی
        $color_match = category::where('category_color',$CategoryColor)->first();
        if($color_match){
            $Error = true;
            $CategoryColorError = "این رنگ قبلا ثبت شده است";
        }
        if(!$Error){
            $Category = new category();
            $Category->category_title = $CategoryTitle;
            $Category->category_color = $CategoryColor;
            $Category->save();
            $data = [
                'status' => 'success',
                'message' => 'دسته بندی با موفقیت اضافه شد'
            ];
            return redirect(route('Categories-List'))->with($data);
        }
        $data = [
            'CategoryTitleError' => $CategoryTitleError,
            'CategoryColorError' => $CategoryColorError
        ];
        return redirect()->back()->with($data);
    }

    // صفحه ویرایش دسته بندی
    public function Category_Edit($id){
        $category = category::findOrFail($id);
        $data = [
            'title' => ' - ویرایش دسته بندی',
            'category_info' => $category
        ];
        return view('Admin_Template.Main_Contents.Category.Category_Edit',$data);
    }

    // اعتبار سنجی ثبت دسته بندی
    public function CategoryEditValidation(){
        // دریافت اطلاعات لازم
        $id = request()->Id;
        $EntryCategoryTitle = request()->EntryCategoryTitle;
        $EntryCategoryColor = request()->EntryCategoryColor;
        $LastTitle = request()->LastTitle;
        $LastColor = request()->LastColor;
        $change = "";
        $TitleError = $ColorError = "";
        $Error = false;
        // تشخیص صلاحیت ثبت عنوان دسته بندی
        $title_match = category::where('category_title',$EntryCategoryTitle)->first();
        $title_match_a = [
            'title' => $title_match
        ];
        if($title_match){
            if($title_match_a['title']['category_title'] != $LastTitle){
                $Error = true;
                $TitleError = "این عنوان قبلا ثبت شده است";
            }
        }
        if(mb_strlen($EntryCategoryTitle) < 2){
            $Error = true;
            $TitleError = "عنوان نمیتواند کمتر از دوحرف باشد";
        }
        // تشخیص صلاحیت ثبت رنگ دسته بندی
        $color_match = category::where('category_color',$EntryCategoryColor)->first();
        $color_match_a = [
            'color' => $color_match
        ];
        if($color_match){
            if($color_match_a['color']['category_color'] != $LastColor){
                $Error = true;
                $ColorError = "این رنگ قبلا ثبت شده است";
            }
        }
        // شروع عملیات آپدیت
        if(!$Error){
            if($EntryCategoryTitle != $LastTitle){
                $change .= "<li>" . "عنوان دسته بندی از " . $LastTitle . " به " . $EntryCategoryTitle . " تغییر یافت" . "</li>";
            }
            if($EntryCategoryColor != $LastColor){
                $change .= "<li>" . "رنگ دسته بندی تغییر یافت" . "</li>";
            }
            $category = category::findOrFail($id);
            $category->category_title = $EntryCategoryTitle;
            $category->category_color = $EntryCategoryColor;
            $category->save();
        }
        $data = [
            'change' => $change,
            'titleerror' => $TitleError,
            'colorerror' => $ColorError
        ];
        return redirect()->back()->with($data);
    }

    // حذف دسته بندی
    public function Category_Delete(){
        category::findOrFail(request()->CategoryId)->delete();
        $data = [
            'status' => 'success',
            'message' => 'دسته بندی با موفقیت حذف شد'
        ];
        return redirect()->back()->with($data);
    }
}
