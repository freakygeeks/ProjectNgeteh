<?php

use Illuminate\Database\Seeder;

class NgetehSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ngeteh_settings')->insert([
            'languange' => 'en',
        ]);
    }
}
