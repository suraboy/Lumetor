<?php

use Illuminate\Database\Seeder;

class {replace}TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\{replace}::class, 5)->create();
    }
}
