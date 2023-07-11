<?php

namespace Database\Seeders;

use App\Models\Expo;
use Illuminate\Database\Seeder;

class ExpoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Expo::query()->forceDelete();
        Expo::create([
            "version"=>"1",
            "name" => "FITECTUR",
            "start_date" => "2022-08-07",
            "end_date" => "2022-08-12",
            "description" => "Disfruta FITECTUR 2022",
            "organizer" => "A-TEC",
            "logo" => "/storage/fitectur.png",
        ]);
        Expo::create([
            "version"=>"lp-2da",
            "name" => "Fexpo",
            "start_date" => "2022-01-06",
            "end_date" => "2022-01-10",
            "description" => "La feria de expos",
            "organizer" => "Someones INC",
            "logo" => "/storage/fexpo.png",
        ]);
        Expo::create([
            "version"=>"0",
            "name" => "FITECTUR",
            "start_date" => "2021-08-09",
            "end_date" => "2021-08-14",
            "description" => "Disfruta FITECTUR 2021",
            "organizer" => "A-TEC",
            "logo" => "/storage/fitectur2021.png",
        ]);
    }
}
