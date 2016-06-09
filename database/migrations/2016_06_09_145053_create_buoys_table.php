<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuoysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buoys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lastDataUpdate');
            $table->decimal('zValue', 3, 2);
            $table->string('shortName', 25);
            $table->string('longName', 100);
            $table->string('stationUrl')->nullable();
            $table->string('state', 2);
            $table->string('ndbcHandler');
            $table->string('imageUrl')->nullable();
            $table->text('description');
            $table->boolean('active');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE buoys ADD location POINT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('buoys');
    }
}
