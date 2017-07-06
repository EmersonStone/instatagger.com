<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaggedPost extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'instagram_id', 'hashtag'
    ];
}
