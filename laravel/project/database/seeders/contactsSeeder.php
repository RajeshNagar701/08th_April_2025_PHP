<?php

namespace Database\Seeders;

use App\Models\contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class contactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeder & faker
        for($i=0;$i<100;$i++)
        {
            $data=new contact;
            $data->name=fake()->name();
            $data->email=fake()->unique()->safeEmail();
            $data->comment=fake()->text();     
            $data->save();
        }
    }
}
