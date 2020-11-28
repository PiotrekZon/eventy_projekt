<?php
 
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('rents', function (Blueprint $table) {
            $table->increments('id'); //id rezerwacji
            $table->integer('place_num'); //numer miejsca
            $table->string('renter'); //uzytkownik rezerwujacy
            $table->integer('event_id'); //id eventu
            $table->float('price')->nullable(); //cena
            $table->tinyInteger('payment_status')->default("0"); //status opłaty
            $table->tinyInteger('status')->default("1"); //status opłaty
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
         Schema::dropIfExists('rents');
    }
}