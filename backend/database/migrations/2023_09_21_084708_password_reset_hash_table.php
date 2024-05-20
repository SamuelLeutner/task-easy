<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PasswordResetHashTable extends Migration
{
    public function up()
    {
        Schema::create('password_reset_table', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('hash'); // Column for storing hashes
            $table->string('email'); // Column for storing email addresses
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('password_reset_table');
    }
}
