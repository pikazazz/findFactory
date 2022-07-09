<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factory extends Model
{
    use HasFactory;
    protected $table = 'factory';

    protected $fillable = [
        'fac_name',
        'fac_no',
        'fac_category',
        'fac_address',
        'fac_utm1',
        'fac_utm2',
        'fac_lat',
        'fac_lon',
        'fac_tel',
        'fac_fax',
        'img',
    ];
}
