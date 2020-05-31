<?php

use App\Models\Car;
use App\Models\Park;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Car::class, 30)->create();
    }
}
