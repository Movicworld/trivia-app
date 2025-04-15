<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar_url')->nullable()->after('password');
            $table->string('google_id')->nullable()->after('avatar_url');
            $table->string('user_id')->unique()->after('id');
            $table->boolean('is_verified')->default(false)->after('email_verified_at');
            $table->enum('status', ['active', 'inactive'])->default('active')->after('is_verified');
            $table->timestamp('last_login')->nullable()->after('remember_token');
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['avatar_url', 'google_id']);
            $table->dropColumn(['user_id', 'is_verified', 'status', 'last_login']);
            $table->dropSoftDeletes();
        });
    }
};
