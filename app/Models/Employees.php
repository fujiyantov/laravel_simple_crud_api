<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'phone_number',
        'email',
        'province',
        'city',
        'street',
        'zip_code',
        'ktp_number',
        'ktp_file',
        'position_id',
        'bank_id',
        'account_number',
    ];
}
