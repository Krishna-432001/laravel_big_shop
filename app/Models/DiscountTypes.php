<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountTypes extends Model
{
    use HasFactory;
    protected $fillable=[
        'start-date',
        'end_date',
        'type',
        'never_expired'
    ];
}
