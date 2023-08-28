<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiddingsTable extends Migration
{
    public function up()
    {
        Schema::create('biddings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('bid_amount', 10, 2);
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('biddings');
    }
}
