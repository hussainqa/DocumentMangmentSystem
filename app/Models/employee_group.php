<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_group extends Model
{
    use HasFactory;
    protected $fillable=['employee_id','group_id','Role'];
    protected $table='employee_group';
}
