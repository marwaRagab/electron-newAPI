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
    /*
    id int [pk, increment]
    installment_id int [ref: > installment.id]
    amount varchar [not null]
    status varchar [not null]
    stop_travel int [ null]
    stop_salary int [ null]
    stop_car int [ null]
    stop_bank int [ null]
    certificate int [ null]
    caseProof int [ null]
    archived int [ null]

    reminder_amount float [ null]
    is_reminder_amount int [ null]
    madionia_amount varchar [not null]
    eqrar_dain_amount varchar [not null]
    execute varchar [not null]

    payment_done varchar [not null]
    law_percent varchar [not null]
    excute_actions_check_amount float [ null]
    excute_actions_amount float [ null]
    excute_actions_counter float [ null]
    checking int [ null]
    excute_actions_last_date_check date [ null]
    place float [ null]
    issue_id int [ null]
    emp_id int [ref: > users.id]
    date date [not null]

    created_by  int [ref: > users.id]
    updated_by  int [ref: > users.id]
    created_at timestamp
    updated_at timestamp
    deleted_at timestamp

     */
    public function up()
    {
        Schema::create('military_affairs', function (Blueprint $table) {
            $table->id();
            $table()->string('amount')->nullable();
            $table->string('status')->nullable();
            $table->integer('stop_travel')->nullable();
            $table->integer('stop_salary')->nullable();
            $table->integer('stop_car')->nullable();
            $table->integer('stop_bank')->nullable();
            $table->integer('certificate')->nullable();
            $table->integer('caseProof')->nullable();
            $table->integer('archived')->nullable();
            $table->float('reminder_amount')->nullable();
            $table->integer('is_reminder_amount')->nullable();
            $table->string('madionia_amount');
            $table->string('eqrar_dain_amount');
            $table->strng('execute');
            $table->string('payment_done');
            $table->string('law_percent');
            $table->float('excute_actions_check_amount')->nullable();
            $table->float('excute_actions_amount')->nullable();
            $table->float('excute_actions_counter')->nullable();
            $table->integer('checking')->nullable();
            $table->date('excute_actions_last_date_check')->nullable();
            $table->float('place')->nullable();
            $table->integer('issue_id')->nullable();
            $table->integer('emp_id')->
                $table->unsignedBigInteger('installment_id')->nullable();
            $table->foreign('installment_id')->references('id')->on('installment')->onDelete('set null');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');

            $table->softDelete();
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
        Schema::dropIfExists('military_affairs');
    }
};
