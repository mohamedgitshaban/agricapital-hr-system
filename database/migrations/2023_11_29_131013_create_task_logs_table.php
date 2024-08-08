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
        Schema::create('task_logs', function (Blueprint $table) {
            $table->id();
            $table->text("description")->default("");
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('Assigned_By');
            $table->unsignedBigInteger('Dependencies')->nullable();

            $table->foreign('Dependencies')->references('id')->on('task_logs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('Assigned_By')->references('id')->on('users')->onDelete('cascade');
            $table->string('status')->default("pending");
            $table->integer("Priority");
            $table->date('startdate');
            $table->date('actualstartdate');
            $table->date('enddate');
            $table->date('actualenddate');
            $table->text("resson")->default("");
            $table->float("DaysSpent")->nullable();
            $table->float("Taregt")->nullable();
            $table->float("Space")->nullable();
            $table->date('starttask')->nullable();
            $table->date('Completiondate')->nullable();
            $table->float("rate")->nullable();
            $table->text("Notes")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_logs');
    }
};
