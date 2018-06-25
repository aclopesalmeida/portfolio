<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interest_translations', function (Blueprint $table) {
            $table->integer('interest_id', false, true)->length(10);
            $table->string('languageCode');
            $table->string('name', 50);
            $table->primary(['interest_id', 'languageCode']);
            $table->foreign('languageCode')->references('code')->on('languages')->onDelete('cascade');
            $table->foreign('interest_id')->references('id')->on('interests')->onDelete('cascade');
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
        Schema::dropIfExists('interest_translations');
    }
}
