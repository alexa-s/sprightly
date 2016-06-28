<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'projects';

  /**
   * The database primary key value.
   *
   * @var string
   */
  protected $primaryKey = 'id';

  protected $fillable = [ 'title', 'description' ];

  public $timestamps = false;

  public function users()
  {
    return $this->belongsToMany(User::class)->orderBy('id');
  }

  public function tasks()
  {
    return $this->hasMany(Task::class);
  }

  public function activeTasks()
  {
    return $this->hasMany(Task::class)->where('active', true);
  }

  public function inactiveTasks()
  {
    return $this->hasMany(Task::class)->where('active', false);
  }
}
