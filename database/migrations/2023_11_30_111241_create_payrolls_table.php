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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('Date');
            $table->Integer('workdays');
            $table->Integer('holidays');
            $table->Integer('attendance');
            $table->float('PresenceMargin');
            $table->float('excuses');
            $table->float('additions');
            $table->float('deductions');
            $table->float('dailyrate');
            $table->float('paiddays');
            $table->float('SocialInsurance');
            $table->float('MedicalInsurance');
            $table->float('tax');
            $table->float('kpi');
            $table->float('performanceRate');
            $table->float('performanceIncentive');
            $table->float('TotalPay');
            $table->float('TotalLiquidPay');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
