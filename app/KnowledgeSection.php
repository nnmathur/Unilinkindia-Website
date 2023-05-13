<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KnowledgeSection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status', 'page_id'
    ];
}
