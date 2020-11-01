<?php

use App\Models\Hospital;
use Illuminate\Database\Seeder;

/**
 * Class HospitalTableSeeder.
 */
class HospitalTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();
        Hospital::create([
           
                    'code' => 'UHC001',
                    'name' => 'AROGYA HOSPITALS LTD (PVT) LTD - GAMPAHA'
        ]);

        Hospital::create([

            'code' => 'UHC002',
            'name' => 'ASIRI HOSPITAL HOLDINGS PLC (ASIRI GROUP)'
        ]);

        Hospital::create([

            'code' => 'UHC003',
            'name' => 'ASIRI HOSPITAL MATARA (PVT) LTD (ASIRI GROUP)'
        ]);

        Hospital::create([

            'code' => 'UHC004',
            'name' => 'ASIRI SURGICAL HOSPITAL PLC (ASIRI GROUP)'
        ]);

        Hospital::create([

            'code' => 'UHC005',
            'name' => 'AVE MARIYA HOSPITAL (PVT) LTD - NEGOMBO'
        ]);

        Hospital::create([

            'code' => 'UHC006',
            'name' => 'CENTRAL HOSPITAL - BADULLA'
        ]);

        Hospital::create([

            'code' => 'UHC007',
            'name' => 'CEYLON HOSPITALS PLC (DURDANS)'
        ]);

        Hospital::create([

            'code' => 'UHC008',
            'name' => 'DURDANS HEART CENTRE (PVT) LTD - (DURDANS)'
        ]);

        Hospital::create([

            'code' => 'UHC009',
            'name' => 'G V HOSPITAL (PVT) LTD - BATTICALOA'
        ]);

        Hospital::create([

            'code' => 'UHC010',
            'name' => 'GOLDEN KEY HOSPITALS LIMITED'
        ]);

        Hospital::create([

            'code' => 'UHC011',
            'name' => 'HEMAS HOSPITALS (PVT) LTD - WATTALA'
        ]);

        Hospital::create([

            'code' => 'UHC012',
            'name' => 'JOSEPH FRASER MEMORIAL HOSPITAL'
        ]);
        $this->enableForeignKeys();
    }
}
