<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique();
            $table->date('is_active');
            $table->string('patient', 50);
            $table->string('phone')->nullable();
            $table->string('doctor', 50);
            $table->date('birthday');
            $table->string('dentistry', 50);
            $table->string('lab', 50);
            $table->string('type', 50);
            $table->integer('num_of_teeth');
            $table->string('locations', 50);
            $table->softDeletes();
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
        Schema::dropIfExists('customers');
    }
}
