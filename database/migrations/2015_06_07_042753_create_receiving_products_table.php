<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivingProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('receiving_products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('receiving_id')->unsigned();
			$table->foreign('receiving_id')->references('id')->on('receivings')->onDelete('restrict');
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
			$table->decimal('cost_price',9, 2);
			$table->integer('quantity');
			$table->decimal('total_cost',9, 2);
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
		Schema::drop('receiving_products');
	}

}
