<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('work_in_progress', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->integer('qty');
            $table->timestamp('stored_date')->nullable();
            $table->string('description');
            $table->string('stage_of_production');
            $table->date('eta');
            $table->decimal('total_cost');
            $table->string('raw_materials');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
