<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2023_02_25_074953_add_foreign_key_users_table.php
        // Schema::table('users', function (Blueprint $table) {
        //     $table->foreignId('review_id')->constrained();
        // });
=======
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable();
        });
>>>>>>> 68b04d725a8086c91c87c1d9fd9f61b018fb7a89:database/migrations/2023_02_27_034543_add_user_add_column.php
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
