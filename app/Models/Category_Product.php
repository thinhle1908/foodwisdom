<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Product extends Model
{
    protected $table = 'category_product';
    protected $primaryKey = ['product_id', 'category_id'];
    protected $fillable = ['product_id', 'category_id','created_at','updated_at'];
    public $timestamps = true;
    public $incrementing = false;
    use HasFactory;
    // public function categories()
    // {
    //     return $this->hasOne(Category::class);
        
    // }
}
