<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [];
        $today = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
        $tomorrow = mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));

        for ($i = 1; $i < 10; $i++) {
            $array[] = $this->attribution($i, $i, $today);
            $array[] = $this->attribution(9 + $i, $i, $tomorrow);
        }
        DB::table('attribution')->insert(
            $array
        );
    }

    private function attribution($id, $i, $date)
    {
        return [
            "id" => $id,
            "id_client" => ($id % 6) + 1,
            "id_ordinateur" => ($id % 5) + 1,
            "horaire" => 8 + $i,
            "date" => date('Y-m-d', $date)
        ];
    }
}
