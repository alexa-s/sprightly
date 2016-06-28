<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tasks', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('project_id');
      $table->string('title');
      $table->text('description');
      $table->enum('type', ['product', 'sprint', 'progress', 'done'])->default('product');
      $table->enum('size', ['XS', 'S', 'M', 'L', 'XL'])->default('M');
      $table->unsignedInteger('duration')->default(0);
      $table->unsignedInteger('predicted_duration')->default(0);
      $table->boolean('active')->default(true);

      //foreign keys
      $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('tasks');
  }
}
