<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'sub_sub_category_name_en',
        'sub_sub_category_name_ban',
        'sub_sub_category_slug_en',
        'sub_sub_category_slug_ban',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }
}
