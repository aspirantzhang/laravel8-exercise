<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('post')->cascadeOnDelete();
            $table->unsignedBigInteger('user_id');
            $table->text('body');
            $table->timestamps();

            // $table->foreign('post_id')->references('id')->on('post')->onDelete('cascade');
            // $table->foreign('post_id')->references('id')->on('post')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
