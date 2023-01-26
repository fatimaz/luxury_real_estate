<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "item";
    protected $fillable =['name', 'price', 'small_ds', 'meta', 'large_ds','transaction' ,'square','square_inter'
       , 'rooms' , 'bath', 'status',  'user_id','category_id','city_id','month','year'];

    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'category_id');
    }
    public function photos(){
        return $this->hasMany(Pictures::class);
    }
    public function cities()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public function firstPhoto(){
        return $this->hasOne(Pictures::class);

    }


}
