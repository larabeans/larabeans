<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class UpdateDbTablesToAddTenantId extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
      $tables = DB::select('SHOW TABLES');
      foreach ($tables as $table) {
        foreach ($table as $key => $name) {
          if(Config::get('tenant-container.enabled') && !in_array($name, Config::get('tenant-container.ignore_tables'))){
            Schema::table($name, function (Blueprint $t) {
              if (Schema::hasColumn($t->getTable(), 'id')) {
                $t->uuid('tenant_id')->after('id')->nullable();
              } else {
                $t->uuid('tenant_id')->first()->nullable();
              }
            });
          }
        }
      }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
      $tables = DB::select('SHOW TABLES');
      foreach ($tables as $table) {
        foreach ($table as $key => $name)
          if(Config::get('tenant-container.enabled') && !in_array($name, Config::get('tenant-container.ignore_tables'))){
            Schema::table($name, function (Blueprint $t) {
              if (Schema::hasColumn($t->getTable(), 'tenant_id')) {
                $t->dropColumn('tenant_id');
              }
            });
          }
      }
    }
}
