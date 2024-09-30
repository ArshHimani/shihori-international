<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',        // Unique product name
        'product_title',       // Product title
        'product_description', // Product description
        'product_type',        // Product type
        'product_image',       // Product image path
    ];
}