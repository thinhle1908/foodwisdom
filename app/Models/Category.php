<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['id', 'category_name','created_at','updated_at'];
    public $timestamps = true;
    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
