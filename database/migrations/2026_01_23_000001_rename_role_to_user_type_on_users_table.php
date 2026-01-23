<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'role') && ! Schema::hasColumn('users', 'user_type')) {
                $table->renameColumn('role', 'user_type');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'user_type') && ! Schema::hasColumn('users', 'role')) {
                $table->renameColumn('user_type', 'role');
            }
        });
    }
};

