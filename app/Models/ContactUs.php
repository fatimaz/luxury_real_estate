<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = "contact";
    protected $fillable =[
 'contact_name', 'contact_email', 'contact_tel', 'contact_message', 'view'
    ];
}