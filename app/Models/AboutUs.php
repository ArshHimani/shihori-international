<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'para1',
        'para2',
        'feature1',
        'feature2',
        'feature3',
        'feature1_title',
        'feature2_title',
        'feature3_title',
    ];
}
