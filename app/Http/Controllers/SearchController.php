<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function Search(){
        $Search = request()->ProductSearch ?? '';
        $products = product::where('status','published')->whereRaw("(title like '%$Search%' or description like '%$Search%')")->orderBy('id','desc')->paginate(10);
        $data = [
            'title' => ' - تمامی پست ها',
            'products' => $products
        ];
        return view('Site_Template.Main_Contents.Product.All_Products',$data);
    }
}
