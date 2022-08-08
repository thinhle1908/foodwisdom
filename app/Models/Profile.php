<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profiles";
    protected $fillable = ['id', 'user_id','image','mobile','line1','line2','city','province','country','zipcode','created_at','updated_at'];
    public $timestamps = true;
    use HasFactory;
    
}
