<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::create([
            'store' => 'Bradenton',
            'address' => "4500 Manatee Ave. W.\nBradenton, FL 34209",
            'phone' => '941-750-6771',
        ]);
        
        Store::create([
            'store' => 'Gainesville - UF Campus',
            'address' => "1700 Stadium Rd\nGainesville, FL 32603",
            'phone' => '352-378-4972',
        ]);

        Store::create([
            'store' => 'Gainesville - on 5th Ave',
            'address' => "619 NW 5th Avenue\nGainesville, FL 32601",
            'phone' => '352-378-4972',
        ]);

    }
}
