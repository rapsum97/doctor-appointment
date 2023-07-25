<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Create New Columns
            $table->unsignedBigInteger('role_id')->unsigned()->nullable()->after('password');
            $table->string('gender')->nullable()->after('role_id');
            $table->longtext('address')->nullable()->after('gender');
            $table->string('country')->nullable()->after('address');
            $table->string('city')->nullable()->after('country');
            $table->string('pincode')->nullable()->after('city');
            $table->string('phone')->nullable()->after('pincode');
            $table->string('department')->nullable()->after('phone');
            $table->string('image')->nullable()->after('department');
            $table->string('education')->nullable()->after('image');
            $table->longtext('description')->nullable()->after('education');

            // Create Foreign Key Constraints
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');;
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
            // Drop Foreign Key Constraints
            $table->dropForeign(['role_id']);

            // Drop the Columns
            $table->dropColumn(['role_id', 'gender', 'address', 'country', 'city', 'pincode', 'phone', 'department', 'image', 'education', 'description']);
        });
    }
}
