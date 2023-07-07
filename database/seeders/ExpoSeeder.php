<?php

namespace Database\Seeders;

use App\Models\Expo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

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
            "created_by" => User::where('email', 'admin@jucux.com')->first()->id,
            "updated_by" => User::where('email', 'admin@jucux.com')->first()->id,
        ]);
    }
}
