<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadTypes extends Model
{
    protected $table = 'upload_types';
    protected $fillable = [
        'type',
        'title',
        'active'
    ];
}
