<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document_employee extends Model
{
    use HasFactory;
    protected $table='documet_employee';
    protected $fillable=['employee_id','document_id'];
}
