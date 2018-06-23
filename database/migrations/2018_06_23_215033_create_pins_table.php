<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pins', function (Blueprint $table) {
            $table->increments('id');
            $table->softDeletes();
            $table->string('address')->nullable();
            $table->text('details')->nullable();
            $table->decimal('lat', 15,10);
            $table->decimal('lng', 15,10);
            $table->integer('status')->nullable();

            $table->integer('pin_type_id')->unsigned()->nullable();
            $table->integer('badge_type_id')->unsigned()->nullable();
            $table->timestamps();


            $table->foreign('pin_type_id')
                    ->references('id')->on('pin_types');
            $table->foreign('badge_type_id')
                    ->references('id')->on('badge_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pins');
    }
}
