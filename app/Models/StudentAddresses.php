<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAddresses extends Model
{
    protected $table = 'student_address';

    protected $fillable = [
        'houseNo', 'line_1', 'line_2', 'postcode', 'city'
    ];
}
