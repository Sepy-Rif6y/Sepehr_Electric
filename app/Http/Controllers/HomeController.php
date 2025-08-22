<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // صفحه اصلی
    public function index(){
        $products = product::where('status','published')->orderBy('id','desc')->paginate(10);
        $data = [
            'products' => $products
        ];
        return view('Site_Template.Main_Contents.Main_Content',$data);
    }

    public function All_Products(){
        $products = product::where('status','published')->orderBy('id','desc')->paginate(10);
        $data =[
            'title' => ' - تمامی پست ها',
            'products' => $products
        ];
        return view('Site_Template.Main_Contents.Product.All_Products',$data);
    }
}
