<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KnowledgeSubSection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'section_id', 'status', 'page_id'
    ];
}
