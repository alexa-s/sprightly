<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  public $timestamps = false;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'tasks';
  /**
   * The database primary key value.
   *
   * @var string
   */
  protected $primaryKey = 'id';
  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['project_id', 'title', 'description', 'type', 'size', 'duration', 'predicted_duration', 'active'];

  public function users()
  {
    return $this->belongsToMany(User::class)->orderBy('id');
  }

  public function project()
  {
    return $this->belongsTo(Project::class);
  }
}
