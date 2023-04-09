<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    use HasFactory;
    protected $table='group';
    protected $fillable =['name'];


    public function employee()
    {
        return $this->belongsToMany(Employee::class)->withTimestamps()->withPivot('Role');
    }
    public function uploader_document()
    {
        return $this->belongsToMany(document::class,'uploader_group')->withTimestamps();
    }
    public function receiver_group()
    {
        return $this->belongsToMany(document::class,'receiver_group')->withTimestamps();
    }
    public function document_archived()
    {
        return $this->belongsToMany(document::class,'document_archived')->withTimestamps();
    }
    public function ExIm_document()
    {
        return $this->belongsToMany(document::class,'archived_group')->withTimestamps()->withPivot('import_export');
    }
}
