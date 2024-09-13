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
        Schema::create('wip_table', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->integer('qty');
            $table->timestamp('stored_date')->nullable();
            $table->text('description');
            $table->date('wip_eta');
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
