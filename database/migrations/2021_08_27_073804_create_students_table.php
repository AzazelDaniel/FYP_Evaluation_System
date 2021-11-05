<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('no_matrix')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('current_sem');
            $table->string('project_category');
            $table->string('project_title');
            $table->integer('supervisor')->unsigned()->nullable();
            $table->integer('fyp1_examiner1')->unsigned()->nullable();
            $table->integer('fyp1_examiner2')->unsigned()->nullable();
            $table->integer('fyp2_examiner1')->unsigned()->nullable();
            $table->integer('fyp2_examiner2')->unsigned()->nullable();
            $table->decimal('fyp1_supervisor_mark', $precision = 4, $scale = 2)->default(0);         
            $table->decimal('fyp1_examiner1_mark', $precision = 4, $scale = 2)->default(0);
            $table->decimal('fyp1_examiner2_mark', $precision = 4, $scale = 2)->default(0);
            $table->decimal('fyp2_supervisor_mark', $precision = 4, $scale = 2)->default(0);
            $table->decimal('fyp2_examiner1_mark', $precision = 4, $scale = 2)->default(0);
            $table->decimal('fyp2_examiner2_mark', $precision = 4, $scale = 2)->default(0);
            $table->decimal('total_mark', $precision = 5, $scale = 2)->default(0);
            $table->char('gred_fyp', 1);
            $table->foreign('supervisor')
                ->references('id_staff')->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('fyp1_examiner1')
                ->references('id_staff')->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('fyp1_examiner2')
                ->references('id_staff')->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('fyp2_examiner1')
                ->references('id_staff')->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('fyp2_examiner2')
                ->references('id_staff')->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
