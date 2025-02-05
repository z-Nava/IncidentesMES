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
        Schema::create('incidentes', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->text('issue')->nullable();
            $table->string('evidence')->nullable(); 
            $table->text('general_problem')->nullable();
            $table->string('category')->nullable();
            $table->string('classification')->nullable();
            $table->string('job')->nullable();
            $table->string('line')->nullable();
            $table->string('persons_attended')->nullable();
            $table->integer('persons_involved')->nullable();
            $table->string('total_invested_time')->nullable(); 
            $table->text('actions')->nullable();
            $table->string('will_happen_again')->nullable(); 
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidentes');
    }
};
