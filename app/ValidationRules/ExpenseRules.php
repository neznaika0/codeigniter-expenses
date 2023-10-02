<?php

declare(strict_types=1);

namespace App\ValidationRules;

class ExpenseRules
{
    public static function create(): array
    {
        return [
            'amount' => [
                'label' => 'Expense.entity.amount',
                'rules' => 'required|greater_than[0]',
            ],
            'created_at' => [
                'label' => 'Expense.entity.created_at',
                'rules' => 'required|valid_date[Y-m-d\TH:i]',
            ],
            'description' => [
                'label' => 'Expense.entity.description',
                'rules' => 'required|min_length[10]|max_length[5000]',
            ],
        ];
    }
}
