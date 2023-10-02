<?php

declare(strict_types=1);

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ExpenseSeeder extends Seeder
{
    public function run()
    {
        $descriptions = [
            'Bread', 'Butter', 'Milk', 'Eggs', 'Drinks', 'Apples', 'Pears', 'Bananas', 'Potatoes', 'Tomatoes', 'Cucumbers', 'Pear', 'Plum', 'Kiwi', 'Avocado', 'Coconut', 'Beef', 'Pork', 'Lamb', 'Rabbit', 'Duck', 'Veal',
        ];
        $now = new Time();

        for ($index = 0; $index < 100; $index++) {
            shuffle($descriptions);
            $createdAt = $now->subDays(random_int(1, 28))
                ->subMonths(random_int(1, 12))
                ->subHours(random_int(1, 23))
                ->subMinutes(random_int(1, 30))
                ->setSecond(0);
            $data[$index] = [
                'amount'      => random_int(5000, 100000),
                'description' => implode(', ', [$descriptions[0], $descriptions[1], $descriptions[2], $descriptions[3]]),
                'created_at'  => $createdAt,
            ];
        }

        $this->db->table('expense')->insertBatch($data);
    }
}
