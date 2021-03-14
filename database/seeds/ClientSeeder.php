<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Rizah Baruiz',
                'address' => 'San Fernando, Cebu',
                'phone' => '09102235467',
                'capitalization' => 100000.00,
                'loan_balance' => 50000.00
            ],

            [
                'name' => 'Marie Molina',
                'address' => 'Catmon, Cebu',
                'phone' => '09051668829',
                'capitalization' => 150000.00,
                'loan_balance' => 50000.00
            ],

            [
                'name' => 'Kindjerz Zanoria',
                'address' => 'San Francisco, Camotes',
                'phone' => '09070119197',
                'capitalization' => 500000.00,
                'loan_balance' => 120000
            ],

            [
                'name' => 'Wendy Tamayo',
                'address' => 'Tubigon, Bohol',
                'phone' => '09251550754',
                'capitalization' => 600000.00,
                'loan_balance' => 150000.00
            ],
        ];

        foreach($data as $client){
            \App\Client::create($client);
        }
    }
}
