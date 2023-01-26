<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pictures extends Model
{
   protected $table = 'pictures';
    protected $fillable =['item_id', 'pic_name', 'mime', 'original_filename'];

    public function product()
    {
        return $this->belongsTo(Item::class);
    }

}
