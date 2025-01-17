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
        Schema::table('transactions_completed', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('communcation_method_id')->nullable();
            $table->foreign('communcation_method_id')->references('id')->on('communcation_methods')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions_completed', function (Blueprint $table) {
            //
        });
    }
};
