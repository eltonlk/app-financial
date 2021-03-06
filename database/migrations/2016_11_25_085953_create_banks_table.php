<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{

		public function up()
		{
				Schema::create('banks', function(Blueprint $table) {
						$table->increments('id');
						$table->string('name');
						$table->string('logo')->nullable();
						$table->timestamps();
				});
		}

		public function down()
		{
				Schema::drop('banks');
		}

}
