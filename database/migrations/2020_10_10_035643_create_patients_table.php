<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active');
            $table->string('name');
            $table->string('father_name');
            $table->boolean('gender');
            $table->date('dob');
            $table->integer('age');
            $table->string('nrc')->nullable();
            $table->string('passport')->nullable();
            $table->string('nationality');
            $table->text('place_of_birth')->nullable();
            $table->text('current_address');
            $table->string('contact_person_name');
            $table->string('contact_person_phone');
            $table->string('patient_code')->nullable();
            $table->string('martial_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('allergies')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('medical_info_remark')->nullable();
            $table->integer('created_by');
            $table->integer('modified_by');
            $table->timestamp('printed_at')->nullable();
            $table->integer('printed_by')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
