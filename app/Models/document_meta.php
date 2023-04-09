<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document_meta extends Model
{
    use HasFactory;
    protected $table='document_meta';
    protected $fillable = [
        'document_id',
        'employee_id',
        'info_1',
        'info_2',
        'info_3',
        'info_4',
        'info_5',
        'info_6',
        'info_7',
        'info_8',
    ];
}
