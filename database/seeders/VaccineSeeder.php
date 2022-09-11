<?php

namespace Database\Seeders;

use App\Models\Vaccine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vaccines = [
            [
                "vaccine_name" => "Foot and Mouth Disease (FMD)",
                "age_of_first_dose" => rand(0, 20),
                "booster" => rand(0, 20),
                "subsequent_dose" => rand(0, 20),
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
            [
                "vaccine_name" => "Haemorrhagic Septicaemia (HS)",
                "age_of_first_dose" => rand(0, 20),
                "booster" => rand(0, 20),
                "subsequent_dose" => rand(0, 20),
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
            [
                "vaccine_name" => "Black Quarter (BQ)",
                "age_of_first_dose" => rand(0, 20),
                "booster" => rand(0, 20),
                "subsequent_dose" => rand(0, 20),
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
            [
                "vaccine_name" => "Brucellosis",
                "age_of_first_dose" => rand(0, 20),
                "booster" => rand(0, 20),
                "subsequent_dose" => rand(0, 20),
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
            [
                "vaccine_name" => "Theileriosis",
                "age_of_first_dose" => rand(0, 20),
                "booster" => rand(0, 20),
                "subsequent_dose" => rand(0, 20),
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
            [
                "vaccine_name" => "Anthrax",
                "age_of_first_dose" => rand(0, 20),
                "booster" => rand(0, 20),
                "subsequent_dose" => rand(0, 20),
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
            [
                "vaccine_name" => "IBR",
                "age_of_first_dose" => rand(0, 20),
                "booster" => rand(0, 20),
                "subsequent_dose" => rand(0, 20),
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
            [
                "vaccine_name" => "Rabies (Post bite therapy only))",
                "age_of_first_dose" => rand(0, 20),
                "booster" => rand(0, 20),
                "subsequent_dose" => rand(0, 20),
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
        ];

        foreach ($vaccines as $vaccine) {
            Vaccine::create($vaccine);
        }
    }
}
