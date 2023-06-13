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
        Schema::table('users', function (Blueprint $table) {
            $table->string('noHp')->nullable()->after('email');
            $table->string('jenKel')->nullable()->after('noHp');
            $table->date('tglLahir')->nullable()->after('jenKel');
            $table->string('foto')->nullable()->after('tglLahir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('noHP');
            $table->dropColumn('jenKel');
            $table->dropColumn('tglLahir');
            $table->dropColumn('foto');
        });
    }
};
