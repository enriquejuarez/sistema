<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('personas')->onDelete('cascade');

            $table->string('usuario')->unique();
            $table->string('password');
            $table->boolean('condicion')->default(1);

            $table->integer('idrol')->unsigned();
            $table->foreign('idrol')->references('id')->on('roles');

            $table->rememberToken();
            //$table->timestamps();
        });
        DB::table('personas')->insert(array('id'=>'1', 'nombre'=>'root', 'tipo_documento'=>'DUC', 'num_documento' => '1345', 'direccion' => 'Cuahutemoc 23', 'telefono' => '2281152345', 'email' => 'caenjuji@gmail.com'));
        DB::table('users')->insert(array('id'=>'1', 'usuario'=>'caenjuji', 'password'=>bcrypt('123'), 'condicion'=>'1', 'idrol' => '1'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
