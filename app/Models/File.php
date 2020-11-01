<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class File.
 */
class File extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ref_no',
        'name',
        'size',
        'extension',
        'url',
        'proposal_upload_type_id'
    ];

    protected $appends = ['full_url'];

    public function getFullUrlAttribute()
    {
        return env("APP_URL") . "/" . $this->url;
    }
}
