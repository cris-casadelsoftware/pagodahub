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
        Schema::create('bankdeposits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('dates')->nullable();
            $table->longText('banks')->nullable();
            $table->double('cash', 8, 2)->nullable();
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
        Schema::dropIfExists('bankdeposit');
    }
};
