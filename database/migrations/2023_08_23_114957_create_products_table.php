<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->enum('category', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20']);
            $table->decimal('starting_bid_price', 10, 2);
            $table->decimal('current_bid_price', 10, 2)->nullable();
            $table->decimal('bid_increment', 10, 2);
            $table->decimal('reserve_price', 10, 2);
            $table->dateTime('BidStartTime');
            $table->dateTime('BidEndTime');
            $table->unsignedBigInteger('SellerID')->nullable();
            $table->unsignedBigInteger('BuyerID')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->enum('status', ['1', '2', '3', '4'])->default('1');
            $table->enum('payment_status', ['1', '2', '3'])->default('1');
            $table->integer('number_of_bids')->default(0);
            $table->string('transaction_id')->nullable();
            $table->text('additional_terms')->nullable();
            $table->timestamps();

            // Add foreign key constraints if needed
            // $table->foreign('SellerID')->references('id')->on('users');
            // $table->foreign('BuyerID')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
