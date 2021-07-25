<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepositoriesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $now = date('Y-m-d H:i:s');
    DB::table('repositories')->insert([
      [
        'name' => 'project-teste',
        'link' => 'project-teste.com',
        'created_at' => $now,
        'updated_at' => $now,
      ]
    ]);
  }
}
