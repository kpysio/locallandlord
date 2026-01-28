<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('traders', function (Blueprint $table) {
            if (!Schema::hasColumn('traders', 'business_name')) {
                $table->string('business_name')->nullable()->after('approval_status');
            }
            if (!Schema::hasColumn('traders', 'phone')) {
                $table->string('phone')->nullable()->after('business_name');
            }
            if (!Schema::hasColumn('traders', 'plan')) {
                $table->enum('plan', ['silver', 'gold'])->nullable()->after('phone');
            }
        });
    }

    public function down(): void
    {
        Schema::table('traders', function (Blueprint $table) {
            if (Schema::hasColumn('traders', 'plan')) {
                $table->dropColumn('plan');
            }
            if (Schema::hasColumn('traders', 'phone')) {
                $table->dropColumn('phone');
            }
            if (Schema::hasColumn('traders', 'business_name')) {
                $table->dropColumn('business_name');
            }
        });
    }
};