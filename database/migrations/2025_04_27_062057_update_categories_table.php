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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('image_name')->nullable()->after('slug');
            $table->string('button_name')->nullable()->after('image_name');
            $table->integer('is_home')->default(0)->after('button_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('image_name');
            $table->dropColumn('button_name');
            $table->dropColumn('is_home');
        });
    }
};
