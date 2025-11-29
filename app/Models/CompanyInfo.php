<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'company_info';

    protected $fillable = [
        'company_name',
        'tagline',
        'about_us',
        'vision',
        'mission',
        'address',
        'phone',
        'email',
        'whatsapp',
        'website',
        'logo',
        'established_year',
    ];

    protected $casts = [
        'established_year' => 'integer',
        'updated_at' => 'datetime',
    ];
}
