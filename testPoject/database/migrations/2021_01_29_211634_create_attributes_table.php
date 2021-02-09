<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("object_id");
            $table->string("name");
            $table->string("company");
            $table->string("representative_name");
            $table->integer("nr_telephone_representative");
            $table->date("validity_start_date");
            $table->date("expiration_date");
            $table->boolean("active");
            $table->timestamps();

            $table->foreign("object_id")->references("id")->on("objects")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributes');
    }
}
