<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socmeds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('qr_id')->constrained('q_r_s')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('string');
            $table->string('type', 30);
            $table->integer('created_at');
            $table->integer('updated_at');
            $table->integer('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socmeds');
    }
};
