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
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->integer('qty');
            $table->timestamp('stored_date')->nullable();
            $table->string('description');
            $table->string('supplier');
            $table->date('expiry_date');
            $table->string('storage_condition');
            $table->decimal('measurement');
            $table->decimal('cost');
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
