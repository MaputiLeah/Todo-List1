<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{   
    // Adding a foreign key 'user_id' to the 'todos' table
    Schema::table('todos', function (Blueprint $table) {
        $table->foreignId('user_id')->nullable()->constrained();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Dropping the 'user_id' foreign key constraint in the 'todos' table
        Schema::table('todos', function (Blueprint $table) {
            //
        });
    }
};
