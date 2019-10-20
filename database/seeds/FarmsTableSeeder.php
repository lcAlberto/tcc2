<?php

use Illuminate\Database\Seeder;
use App\Models\Farm;
use App\Models\User;

class FarmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createFarm();
    }

    private function createFarm()
    {

        $farm->fill([
            'name' => 'Estância1',
            'cep' => '85155420',
            'city' => 'Inácio Martins',
            'state' => 'PR',
        ]);

        $farm->save();
    }
}
