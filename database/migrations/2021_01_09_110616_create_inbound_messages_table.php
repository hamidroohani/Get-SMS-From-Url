<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboundMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mongodb")->create('inbound_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('source',['farapayamak','rahyab']);
            $table->string('to');
            $table->string('from');
            $table->string('body');
            $table->timestamps();

            $table->index(['source','to','from']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inbound_messages');
    }
}
