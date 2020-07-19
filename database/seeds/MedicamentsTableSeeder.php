<?php

use App\Models\Medicament;
use Illuminate\Database\Seeder;

class MedicamentsTableSeeder extends Seeder
{

    public function run()
    {
        $medicament = Medicament::firstOrNew([
            'name' => 'medicament01'
        ]);

        $medicament->fill([
            'name' => 'medicament01',
            'active_principle' => 'principio atvo01',
//            'indications' => 'endoparasitas',
//            'laboratory' => 'laboratorio01',
//            'admission' => 'oral',
            'grace_period_beef' => '7',
            'grace_period_dairy' => '2',
//            'dosage' => '2',
            'flyer' => 'bula.pdf',
            'thumbnail' => 'imagem.pdf',
            'farm_id' => 1,
        ]);

        $medicament->save();
    }
}
