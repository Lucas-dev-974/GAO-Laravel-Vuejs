<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [];

        for ($i = 1; $i < 7; $i++) {
            $array[] = [
                "id" => $i,
                "name" => "Nom$i",
                "firstname" => "Prénom$i",
            ];
        }
        DB::table('client')->insert(
            $array
        );
    }
}
