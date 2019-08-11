<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_details', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('bid_id');
            $table->string('attractions');
            $table->string('facilities');
            $table->foreign('bid_id')->references('id')->on('bids')->onDelete('cascade');
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
        Schema::dropIfExists('bid_details');
    }
}
