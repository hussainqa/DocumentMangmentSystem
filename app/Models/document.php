<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    use HasFactory;
    protected $table='document';
    protected $fillable=['path','document_number','doc_date','is_attachment'];

    public function employee()
    {
        return $this->belongsToMany(employee::class)->withTimestamps();
    }
    public function uploader_group()
    {
        return $this->belongsToMany(group::class,'uploader_group')->withTimestamps();
    }
    public function receiver_group()
    {
        return $this->belongsToMany(group::class,'receiver_group')->withTimestamps();
    }
    public function meta()
    {
        return $this->belongsToMany(Meta::class,'document_meta')->withTimestamps()->withPivot('info_1', 'info_2', 'info_3', 'info_4', 'info_5', 'info_6', 'info_7', 'info_8');
    }
    public function group_archived()
    {
        return $this->belongsToMany(group::class,'document_archived')->withTimestamps();
    }
    public function ExIm_group()
    {
        return $this->belongsToMany(group::class,'archived_group')->withTimestamps()->withPivot('import_export');
    }
    public function taged_employee()
    {
        return $this->belongsToMany(Employee::class,'taged_employee')->withTimestamps();
    }
}
