<?php

use App\Models\Health;
use Illuminate\Database\Seeder;
use App\Enums\Healths\TreatmenTypeEnum;

class HealthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medicament = Health::firstOrNew([
            'symptom' => 'Febre, baba'
        ]);

        $medicament->fill([
            'symptom' => 'Febre, baba',
            'date_symptom' => '2019-09-03 19:05:00',
            'disease' => 'Febre Aftosa',
            'causer_agent' => 'RNA-vírus, pertencente à família Picornaviridae, gênero Aphtovirus',
            'start_of_treatment' => '2019-09-03 19:05:00',
            'end_of_treatment' => '2019-09-03 19:05:00',
            'treatment_type' => TreatmenTypeEnum::PREVENTIVE,
            'farm_id' => 1,
            'user_id' => 1,
            'animal_id' => 1,
            'medicament_id' => 1,
        ]);

        $medicament->save();
    }
}
