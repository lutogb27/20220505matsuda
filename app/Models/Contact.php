<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'fullname',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion',
    ];

    static $genders = [
        '男', '女'
    ];
}
