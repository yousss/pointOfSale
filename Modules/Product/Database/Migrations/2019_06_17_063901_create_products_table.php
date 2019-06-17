<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('category_id');
            $table->string('category_name', 50)->collation('utf8mb4_unicode_ci')->charset('utf8mb4');
            $table->timestamps();
            $table->index(['category_name']);
        });

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_code',50)->unique();
            $table->string('product_name',100)->collation('utf8mb4_unicode_ci')->charset('utf8mb4');
            $table->float('product_price', 8, 2);
            $table->float('product_weight', 8, 2)->nullable();
            $table->string('product_thumpnail')->nullable();
            $table->string('product_image')->nullable();
            $table->dateTime('product_deleted_at')->nullable();
            $table->enum('product_live', ['online', 'offline', 'both']);
            $table->unsignedSmallInteger('quantity')->default(1);
            $table->unsignedBigInteger('product_category');
            $table->string('product_country_made', 50)->nullable();
            $table->unsignedTinyInteger('product_unlimited')->nullable();
            $table->date('product_expiration_date')->nullable();
            $table->date('product_made_of_date')->nullable();
            $table->string('product_company_name', 50)->nullable();
            $table->unsignedTinyInteger('product_warranty_year')->nullable();
            $table->boolean('product_standard')->default(false);
            $table->index(['product_name', 'product_category']);
            $table->index(['product_name']);
            $table->timestamps();
        });

        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('order_detail_id');
            $table->string('order_detail_code', 50)->collation('utf8mb4_unicode_ci')->charset('utf8mb4')->nullable();
            $table->float('order_detail_price', 8, 2);
            $table->unsignedSmallInteger('order_detail_quantity');
            $table->unsignedMediumInteger('order_detail_product');
            $table->unsignedMediumInteger('order_detail_order');
            $table->index(['order_detail_id', 'order_detail_product']);
            $table->index(['order_detail_id', 'order_detail_order']);
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('order_user')->nullable();
            $table->double('order_total_price', 8, 2);
            $table->unsignedMediumInteger('order_total_quantity');
            $table->string('order_shipping_name', 100)->collation('utf8mb4_unicode_ci')->charset('utf8mb4')->nullable();
            $table->string('order_shipping_address', 100)->collation('utf8mb4_unicode_ci')->charset('utf8mb4')->nullable();
            $table->string('order_shipping_address_two', 100)->nullable();
            $table->string('order_shipping_city', 100)->nullable();
            $table->string('order_shipping_state', 50)->nullable();
            $table->string('order_shipping_zip', 50)->nullable();
            $table->string('order_shipping_country', 100)->nullable();
            $table->string('order_shipping_phone', 20)->nullable();
            $table->string('order_shipping_fax', 100)->nullable();
            $table->string('order_shipping_mail', 100)->nullable();
            $table->boolean('order_shipped')->default(false);
            $table->string('order_tracking_number', 100)->unique()->nullable();
            $table->float('order_shipping_tax', 8, 2)->nullable();
            $table->index(['order_id', 'order_user']);
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
        Schema::dropIfExists('products');
    }
}
