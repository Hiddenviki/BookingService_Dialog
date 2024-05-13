<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dialogs', function (Blueprint $table) {
            $table->id();
            $table->integer('landlord_id');
            $table->integer('tenant_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dialogs');
    }
};
