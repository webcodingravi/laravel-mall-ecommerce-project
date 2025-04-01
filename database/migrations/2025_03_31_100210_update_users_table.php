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
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->nullable()->after('name');
            $table->string('phone')->nullable()->after('email_verified_at');
            $table->string('company_name')->nullable()->after('phone');
            $table->string('country')->nullable()->after('company_name');
            $table->string('address_one')->nullable()->after('country');
            $table->string('address_two')->nullable()->after('address_one');
            $table->string('city')->nullable()->after('address_two');
            $table->string('state')->nullable()->after('address_two');
            $table->string('postcode')->nullable()->after('address_two');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_name');
            $table->dropColumn('phone');
            $table->dropColumn('company_name');
            $table->dropColumn('country');
            $table->dropColumn('address_one');
            $table->dropColumn('address_two');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('postcode');
        });
    }
};