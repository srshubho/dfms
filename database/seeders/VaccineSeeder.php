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
                "age_of_first_dose" => rand(10, 50),
                "booster" => "1 month after first dose",
                "subsequent_dose" => "Six monthly",
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
            [
                "vaccine_name" => "Haemorrhagic Septicaemia (HS)",
                "age_of_first_dose" => rand(10, 50),
                "booster" => "",
                "subsequent_dose" => "Annually in endemic areas.",
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
            [
                "vaccine_name" => "Black Quarter (BQ)",
                "age_of_first_dose" => rand(10, 50),
                "booster" => "",
                "subsequent_dose" => "Annually in endemic areas.",
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
            [
                "vaccine_name" => "Brucellosis",
                "age_of_first_dose" => rand(10, 50),
                "booster" => "",
                "subsequent_dose" => "Once in a lifetime",
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
            [
                "vaccine_name" => "Theileriosis",
                "age_of_first_dose" => rand(10, 50),
                "booster" => "",
                "subsequent_dose" => "Once in a lifetime. Only required for crossbred and exotic cattle",
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
            [
                "vaccine_name" => "Anthrax",
                "age_of_first_dose" => rand(10, 50),
                "booster" => "1 month after first dose",
                "subsequent_dose" => "Annually in endemic areas.",
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
            [
                "vaccine_name" => "IBR",
                "age_of_first_dose" => rand(10, 50),
                "booster" => "",
                "subsequent_dose" => "Six monthly (vaccine presently not produced in India)",
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
            [
                "vaccine_name" => "Rabies (Post bite therapy only))",
                "age_of_first_dose" => rand(10, 50),
                "booster" => "4th day",
                "subsequent_dose" => "7,14,28 and 90 (optional) days after first dose.",
                "repeat" => rand(0, 1),
                "remarks" => "Nothing",
            ],
        ];

        foreach ($vaccines as $vaccine) {
            Vaccine::create($vaccine);
        }
    }
}
