<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_translations', function (Blueprint $table) {
            $table->tinyInteger('applicant_id', false, false);
            $table->string('languageCode', 3);
            $table->string('bachelor', 150);
            $table->string('master', 150);
            $table->primary(['applicant_id', 'languageCode']);
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
            $table->foreign('languageCode')->references('code')->on('languages')->onDelete('cascade');
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
        Schema::dropIfExists('applicant_translations');
    }
}
