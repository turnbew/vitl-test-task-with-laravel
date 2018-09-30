<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 80);
			$table->integer('schools_id')->unsigned()->nullable();
        });
		
		Schema::table('t_members', function($table) {
			$table->foreign('schools_id')->references('id')->on('t_schools')->onDelete('set null');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_members');
    }
}
