<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankrequests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
           /*$table->longText('fromdate')->nullable();
            $table->longText('todate')->nullable(); */
            $table->longText('weeknumber')->nullable();
            $table->double('cash1', 8, 2)->nullable();
            $table->double('cash5', 8, 2)->nullable();
            $table->double('roll0_01', 8, 2)->nullable();
            $table->double('roll0_05', 8, 2)->nullable();
            $table->double('roll0_10', 8, 2)->nullable();
            $table->double('roll0_25', 8, 2)->nullable();
            $table->double('roll0_50', 8, 2)->nullable();
            $table->double('roll1_00', 8, 2)->nullable();
            $table->longText('file_img')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bankrequest');
    }
};
