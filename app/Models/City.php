<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "ville";
    protected $fillable =['name', 'image'];

    public function items(){
        return $this->hasMany(Item::class);
    }

}
