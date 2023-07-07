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
    }
}
