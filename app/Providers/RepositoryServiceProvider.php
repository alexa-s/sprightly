<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Sprightly\Repositories\ProjectRepository;

class RepositoryServiceProvider extends ServiceProvider
{
  /**
   * Register the application services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind(
      ProjectRepository::class,
      function () {
        return new ProjectRepository();
      }
    );
  }
}