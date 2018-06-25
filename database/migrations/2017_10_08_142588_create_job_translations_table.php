<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_translations', function (Blueprint $table) {
            $table->integer('job_id', false, true)->length(10);
            $table->string('languageCode', 6);
            $table->primary(['job_id', 'languageCode']);
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('languageCode')->references('code')->on('languages')->onDelete('cascade');
            $table->string('title', 100);
            $table->string('company', 60);
            $table->string('duration', 30);
            $table->text('tasks', 1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_translations');
    }
}
