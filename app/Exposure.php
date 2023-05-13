<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exposure extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'image', 'short_description', 'description', 'success_story', 'video', 'attachment'
    ];
}
