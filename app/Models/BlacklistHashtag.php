<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlacklistHashtag extends Model {

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id', 'hashtag'
  ];

  public function user() {
    return $this->belongsTo(App\Models\User::class);
  }
}
