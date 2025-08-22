<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Factory;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // لیست نمایش محصولات
    public function index($status = null){
        $per_page = request()->Per_Page ?? 10;
        $Search = request()->ProductSearch ?? '';
        if(!$status){
            $Products = product::whereRaw("(title like '%$Search%' or description like '%$Search%')")->orderBy('id','desc')->paginate($per_page);
            $title = ' - لیست همه محصولات';

        }else{
            $Products = product::where('status',$status)->whereRaw("(title like '%$Search%' or description like '%$Search%')")->orderBy('id','desc')->paginate($per_page);
            switch ($status){
                case "published": $title = " - لیست منتشر شده ها"; break;
                case "rejected": $title = " - لیست تایید نشده ها"; break;
                default: $title = " - لیست در صف انتظار ها";
            }
        }
        $data = [
            'title' => $title,
            'Products_info' => $Products
        ];
        return view('Admin_Template.Main_Contents.Products.Products_List',$data);
    }

    // صفحه افزودن محصول
    public function Product_Add(){
        $Categories = category::all();
        $Factories = Factory::all();
        $data = [
            'title' => ' - افزودن محصول',
            'Categories' => $Categories,
            'Factories' => $Factories,
        ];
        return view('Admin_Template.Main_Contents.Products.Product_Add',$data);
    }

    // اعتبار سنجی ثبت محصول
    public function ProductAddValidation(){
        // دریافت اطلاعات لازم
        $EntryImage = request()->EntryImage;
        $Prefix = date('ymdhis_').'Product.'.$EntryImage->getClientOriginalExtension();
        $EntryImage->move(storage_path('app\\public\\ProductsImage'),$Prefix);
        // برای سیو در پوشه امنیت بالا
        // $ProductSave = $EntryImage->store('PrivateProducts');
        // $ProductName = str_replace('privateProducts/','',$ProductSave);
        $product = new product();
        $product->title = request()->EntryTitle;
        $product->description = request()->EntryDescription;
        $product->image = $EntryImage;
        $product->image = $Prefix;
        $product->category_id = request()->EntryCategory;
        $product->factory_id = request()->EntryFactory;
        if(request()->IsPublished){
            $product->status = request()->IsPublished;
        }
        $product->save();
        $data = [
            'status' => 'success',
            'message' => 'محصول با موفقیت اضافه شد'
        ];
        return redirect(route('Products-List'))->with($data);
    }

    // صفحه ویرایش محصول
    public function Product_Edit($id){
        $Product = product::findOrFail($id);
        $categories = category::all();
        $factories = Factory::all();
        $data = [
            'title' => ' - ویرایش محصول',
            'Product_Info' => $Product,
            'Categories' => $categories,
            'Factories' => $factories,
        ];
        return view('Admin_Template.Main_Contents.Products.Product_Edit',$data);
    }

    // اعتبار سنجی ویرایش محصول
    public function ProductEditValidation(){
        // دریافت اطلاعات لازم
        $id = request()->id;
        $LastTitle = request()->LastTitle;
        $LastDescription = request()->LastDescription;
        $LastCategory = request()->LastCategory;
        $LastFactory = request()->LastFactory;
        $LastStatus = request()->LastStatus;
        $EntryTitle = request()->EntryTitle;
        $EntryDescription = request()->EntryDescription;
        $EntryCategory = request()->EntryCategory;
        $EntryFactory = request()->EntryFactory;
        $Entrystatus = request()->status;
        $status = "";
        $status_last = "";
        $change = "";
        // تغییر داده ها
        switch($Entrystatus){
            case 'published': $status = "منتشر شده" ; break;
            case 'rejected': $status = "لغو انتشار"; break;
            default: $status = "در صف انتظار";
        }
        switch($LastStatus){
            case 'published': $status_last = "منتشر شده" ; break;
            case 'rejected': $status_last = "لغو انتشار"; break;
            default: $status_last = "در صف انتظار";
        }
        $category = category::where('id',$EntryCategory)->value('category_title');
        $factory = factory::where('id',$EntryFactory)->value('factory_title');
        // تشخیص تغییر عنوان
        if($LastTitle != $EntryTitle){
            $change .= "<li>" . "عنوان از " . $LastTitle . " به " . $EntryTitle . " تغییر یافت" . "</li>";
        }
        // تشخیص تغییر شرح
        if($LastDescription != $EntryDescription){
            $change .= "<li>" . "شرح از " . $LastDescription . " به " . $EntryDescription . " تغییر یافت" . "</li>";
        }
        // تشخیص تغییر دسته یندی
        if($LastCategory != $category){
            $change .= "<li>" . "دسته بندی از " . $LastCategory . " به " . $category . " تغییر یافت" . "</li>";
        }
        // تشخیص تغییر کارخانه
        if($LastFactory != $factory){
            $change .= "<li>" . "کارخانه از " . $LastFactory . " به " . $factory . " تغییر یافت" . "</li>";
        }
        // تشخیص تغییر وضعیت
        if($status_last != $status){
            $change .= "<li>" . "وضعیت از " . $status_last . " به " . $status . " تغییر یافت" . "</li>";
        }
        // ثبت در دیتا بیس
        $product = product::findOrFail($id);
        $product->title = $EntryTitle;
        $product->description = $EntryDescription;
        $product->category_id = $EntryCategory;
        $product->factory_id = $EntryFactory;
        $product->status = $Entrystatus;
        $product->save();
        $data = [
            'change' => $change
        ];
        return redirect()->back()->with($data);
    }
    // حذف محصول
    public function Product_Delete(){
        $id = request()->ProductId;
        $ProductForDelete = product::findOrFail($id);
        if(file_exists(public_path('storage\\ProductsImage\\').$ProductForDelete->image)){
            unlink(public_path('storage\\ProductsImage\\').$ProductForDelete->image);
        }
        $ProductForDelete->delete();
        $data = [
            'status' => 'success',
            'message' => 'محصول با موفقیت حذف شد'
        ];
        return redirect()->back()->with($data);
    }
}
