<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Factory;
use App\Models\product;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    // نمایش محصول تکی
    public function Single_Show($id){
        $product = product::findOrFail($id);
        $category_match = product::where('category_id',$product->category_id)->where('id','!=',$id)->where('status','published')->get();
        $factory_No_Match = $category_No_Match = "";
        if(empty($category_match[0])){
            $category_No_Match = "هیچ محصولی در این دسته بندی یافت نشد";
        }
        $factory_match = product::where('factory_id',$product->factory_id)->where('id','!=',$id)->where('status','published')->get();
        if(empty($factory_match[0])){
            $factory_No_Match = "هیچ محصولی در این دسته بندی یافت نشد";
        }
        $data = [
            'title' => ' - نمایش محصول ',
            'product_info' => $product,
            'category_match' => $category_match,
            'factory_match' => $factory_match,
            'category_No_Match' => $category_No_Match,
            'factory_No_Match' => $factory_No_Match
        ];
        return view('Site_Template.Main_Contents.Product.Product_Single',$data);
    }

    // نمایش محصولات در یک دسته بندی
    public function Same_Category($id){
        $products = product::where('category_id',$id)->where('status','published')->orderBy('id','desc')->paginate(10);
        $message = "";
        if(!count($products)){
            $message = 'هنوز محصولی در این دسته بندی ثبت نشده است';
        }
        $data = [
            'title' => ' - محصولات در یک دسته بندی',
            'products' => $products,
            'message' => $message
        ];
        return view('Site_Template.Main_Contents.Product.Products_With_Same_Category',$data);
    }

    // نمایش محصولات در یک کارخانه
    public function Same_Factory($id){
        $products = product::where('factory_id',$id)->where('status','published')->orderBy('id','desc')->paginate(10);
        $message = "";
        if(!count($products)){
            $message = 'هنوز محصولی برای این کارخانه ثبت نشده است';
        }
        $data = [
            'title' => ' - محصولات در یک کارخانه',
            'products' => $products,
            'message' => $message
        ];
        return view('Site_Template.Main_Contents.Product.Products_With_Same_Factory',$data);
    }
}
