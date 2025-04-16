<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('wallets', function (Blueprint $table) {
        $table->enum('currency', ['NGN', 'USD', 'GDP', 'EUR'])->default('NGN')->after('balance');
    });
}

public function down()
{
    Schema::table('wallets', function (Blueprint $table) {
        $table->dropColumn('currency');
    });
}

};
