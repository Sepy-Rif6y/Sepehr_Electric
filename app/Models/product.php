<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class product extends Model
{
    use HasFactory;

    protected $appends = [
        'realtime',
        'factory_name',
        'category_name',
        'short_description',
        'change_status',
    ];

    public Function getRealTimeAttribute(){
        return Carbon::create($this->created_at)->diffForHumans();
    }

    public function getFactoryNameAttribute(){
        return Factory::where('id',$this->factory_id)->value('factory_title');
    }
    public function getCategoryNameAttribute(){
        return category::where('id',$this->category_id)->value('category_title');
    }

    public function getShortDescriptionAttribute()
    {
        return mb_substr($this->description,0,40).'...';
    }

    public function getChangeStatusAttribute(){
        $status = $this->status;
        switch($status){
            case 'published': $status = "<span class='badge bg-success'>منتشر شده</span>" ; break;
            case 'rejected': $status = "<span class='badge bg-danger'>لغو انتشار</span>"; break;
            default: $status = "<span class='badge bg-warning'>در صف انتظار</span>";
        }
        return $status;
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function factory()
    {
        return $this->belongsTo(Factory::class);
    }

}
