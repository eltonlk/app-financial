<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    public function up()
    {
        Schema::create('bills', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('flow_in')->default(true);
            $table->string('description');
            $table->date('due_at');
            $table->decimal('amount', 13, 2)->default(0);
            $table->boolean('paid')->default(false);
            $table->integer('bank_account_id')->unsigned();
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('bills');
    }
}
