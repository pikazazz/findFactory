<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infomation extends Model
{
    use HasFactory;
    protected $table = 'publicrelations';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'info_title',
        'info_factory',
        'info_detail',
        'img',
    ];
}
