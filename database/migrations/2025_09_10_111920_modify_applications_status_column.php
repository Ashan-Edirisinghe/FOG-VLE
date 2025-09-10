<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ModifyApplicationsStatusColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Modify the status enum to include 'approved'
        DB::statement("ALTER TABLE applications MODIFY COLUMN status ENUM('pending', 'under_review', 'accepted', 'rejected', 'approved') DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revert back to original enum values
        DB::statement("ALTER TABLE applications MODIFY COLUMN status ENUM('pending', 'under_review', 'accepted', 'rejected') DEFAULT 'pending'");
    }
}
