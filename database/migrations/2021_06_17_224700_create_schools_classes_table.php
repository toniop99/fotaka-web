<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('promotion');
            $table->smallInteger('students_count');
            $table->smallInteger('teachers_count');
            $table->enum('education_period',
                ['GUARDERIA', 'PARVULITOS', 'INFANTIL', 'PRIMARIA', 'SECUNDARIA', 'BACHILLERATO', 'GRADO MEDIO', 'GRADO SUPERIOR', 'GRADO', 'MASTER']);

            $table->foreign('school_id')
                ->references('id')
                ->on('schools')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('schools_classes');
    }
}
