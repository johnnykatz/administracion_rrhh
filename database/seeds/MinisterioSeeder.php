<?php

use Illuminate\Database\Seeder;

class MinisterioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin\Ministerio::firstOrCreate([
            'id' => '1',
        ]);

    }
}
