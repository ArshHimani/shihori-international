<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'paragraph',
        'phoneNo',
        'email',
        'address',
        'opening_hours',
        'whatsapp',
        'facebook',
        'instagram',
        'linkedIn',
    ];
}
