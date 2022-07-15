<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $benefits_list = [
        'Безкоштовна парковка',
        'Безкоштовний Wi-Fi',
        'Номери для некурців',
        'Обслуговування номерів',
        'Допускається розміщення з домашніми тваринами',
        'Бар',
    ];

    public function run()
    {
        foreach ($this->benefits_list as $benefit_item) {
            DB::table('benefits')->insert([
                'name' => $benefit_item
            ]);
        }
    }
}
