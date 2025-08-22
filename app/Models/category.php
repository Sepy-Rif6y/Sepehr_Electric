<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\product;

class category extends Model
{
    use HasFactory;

    protected $appends = [
        'products_count'
    ];

    public function getProductsCountAttribute(){
        $product = product::all();
        $count = 0;
        foreach($product as $item){
            if($item->category_id == $this->id){
                $count ++;
            }
        }
        return $count;
    }
}
