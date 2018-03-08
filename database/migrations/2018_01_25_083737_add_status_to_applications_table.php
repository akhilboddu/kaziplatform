<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('applications', function (Blueprint $table)
        {
             $table->enum('status',['sent', 'declined', 'accepted', 'default'])->default('default');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table)
        {
             $table->dropColumn('status',['sent', 'declined', 'accepted', 'default'])->default('default');
        });
    }
}
