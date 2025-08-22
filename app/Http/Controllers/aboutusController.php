<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutusController extends Controller
{
        public function index(){
        $data = [
            'title' => " - درباره ما" ,
        ];
        return view('Site_Template.Main_Contents.About_Us',$data);
    }
}
?>
