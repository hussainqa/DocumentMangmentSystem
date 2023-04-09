<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;
    protected $table='meta';
    protected $fillable = [
        'name',
        'info_1',
        'info_2',
        'info_3',
        'info_4',
        'info_5',
        'info_6',
        'info_7',
        'info_8',
    ];
    public function document()
    {
        return $this->belongsToMany(document::class,'document_meta')->withTimestamps()->withPivot('info_1', 'info_2', 'info_3', 'info_4', 'info_5', 'info_6', 'info_7', 'info_8');
    }


}
