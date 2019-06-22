<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('profile_id');
            $table->string('profile_first_name', 100)->nullable();
            $table->string('profile_last_name', 100)->nullable();
            $table->string('profile_primary_phone', 15)->nullable();
            $table->string('profile_secondary_phone', 15)->nullable();
            $table->string('profile_country_code',20)->nullable();
            $table->string('profile_street', 100)->nullable();
            $table->string('profile_organization')->nullable();
            $table->string('profile_state', 30)->nullable();
            $table->string('profile_city', 50)->nullable();
            $table->string('profile_postal_code', 50)->nullable();
            $table->string('profile_latitude', 50)->nullable();
            $table->string('profile_longitude', 50)->nullable();
            $table->boolean('is_primary')->default(true);
            $table->boolean('is_billing')->default(true);
            $table->boolean('is_shipping')->default(true);
            $table->unsignedInteger('profile_user')->nullable();
            $table->dateTime('profile_delete_at')->nullable();
            $table->foreign('profile_user')->references('id')->on('users');
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
        Schema::dropIfExists('profiles');
    }
}
