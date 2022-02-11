<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
}

//'brand_id',
//        'category_id',
//        'subcategory_id',
//        'sub_subcategory_id',
//        'product_name_en',
//        'product_name_ban',
//        'product_slug_en',
//        'product_slug_ban',
//        'product_code',
//        'product_qty',
//        'product_tags_en',
//        'product_tags_ban',
//        'product_size_en',
//        'product_size_ban',
//        'product_color_en',
//        'product_color_ban',
//        'selling_price',
//        'discount_price',
//        'short_descp_en',
//        'short_descp_ban',
//        'long_descp_en',
//        'long_descp_ban',
//        'product_thumbnail',
//        'hot_deals',
//        'featured',
//        'special_offer',
//        'special_deals',
//        'status',
