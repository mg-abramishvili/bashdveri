<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductSurfaceTable extends Migration
{
    public function up()
    {
        Schema::create('product_surface', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('surface_id');
        });
    }

    public function down()
    {
        //
    }
}
