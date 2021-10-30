<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code', 'is_active', 'patient', 'phone', 'doctor', 'birthday', 'dentistry', 'lab', 'type', 'num_of_teeth', 'locations'
    ];

    protected $hidden = [
        'id', 'deleted_at', 'created_at', 'updated_at'
    ];
}
