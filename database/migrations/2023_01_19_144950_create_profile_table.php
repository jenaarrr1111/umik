<?php

use App\Models\Profile;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('username');
            $table->string('no_tlp');
            $table->string('email')->unique();

            $table->enum('level_user', ['user', 'penjual', 'admin_keseluruhan'])
                ->default('user');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        $password = Hash::make('password');
        Profile::firstOrCreate([
            'nama' => 'superadmin',
            'username' => 'superadmin',
            'no_tlp' => '+6282962541463',
            'email' => 'super.admin@gmail.com',
            'password' => $password,
            'level_user' => 'admin_keseluruhan',
            'created_at' => '2022-01-23 21:25:35',
            'updated_at' => '2022-01-23 21:25:35',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');
    }
};
