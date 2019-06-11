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
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('memberNo')->unique();
            $table->date('registerDate')->nullable();
            $table->longtext('expiredDate')->nullable();
            $table->year('yearOfBorn');
            $table->string('nric')->unique();
            $table->string('occupation');
            $table->text('address');
            $table->integer('phoneNo');
            $table->string('paymentstatus');
            $table->string('memberstatus');
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
        Schema::dropIfExists('members');
    }
}
