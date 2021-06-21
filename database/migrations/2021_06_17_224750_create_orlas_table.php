<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrlasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orlas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grade_id')->nullable(false);

            $table->string('path')->nullable(false);
            $table->string('password')->nullable(false);
            $table->timestamps();

            $table->foreign('grade_id')
                ->references('id')
                ->on('schools_classes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orlas');
    }
}
