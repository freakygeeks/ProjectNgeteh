<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sale_products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sale_id')->unsigned();
			$table->foreign('sale_id')->references('id')->on('sales')->onDelete('restrict');
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
			$table->decimal('cost_price',15, 2);
			$table->decimal('selling_price',15, 2);
			$table->integer('quantity');
			$table->decimal('total_cost',15, 2);
			$table->decimal('total_selling',15, 2);
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
		Schema::drop('sale_products');
	}

}
