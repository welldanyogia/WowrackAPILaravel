<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Database\Eloquent\Relations\HasMany;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("name",100)->nullable(false);
            $table->string("email",100)->nullable(false)->unique("users_email_unique");
            $table->string("password",100)->nullable(false);
            $table->timestamp("otp_verified_at");
            $table->string("phone",15)->nullable(true);
            $table->string("address",100)->nullable(true);
//            $table->unsignedBigInteger('subscription_id'); // Make sure it's unsigned
//            $table->unsignedBigInteger('invoice_id');
            $table->string("token",100)->nullable()->unique("users_token_uniques");
            $table->timestamps();

//            $table->foreign("subscription_id")->references('id')->on('subscriptions');
//
//            $table->foreign("invoice_id")->references('id')->on('invoices');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }

    public function subscribtion():HasMany
    {
        return $this->hasMany(\App\Models\Subscription::class);
    }
    public function invoice():HasMany
    {
        return $this->hasMany(\App\Models\Invoice::class);
    }
};
