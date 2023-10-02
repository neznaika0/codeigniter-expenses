<?php

declare(strict_types=1);

namespace App\Cells;

class ConfirmModal
{
    public function deleteExpense(int $id): string
    {
        return view('_sections/delete_expense_modal', ['id' => $id]);
    }
}
