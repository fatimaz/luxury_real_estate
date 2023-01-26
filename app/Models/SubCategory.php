<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';
    protected $fillable =['name','parent_cat_id'];

    /*public function products(){
       // return $this->belongsTo('Bu', 'categories');
        return $this->hasMany('Bu');
    }*/

    public function products(){
        return $this->hasMany(Item::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'parent_cat_id','id');
    }


}
