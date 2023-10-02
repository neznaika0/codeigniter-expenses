<?php

declare(strict_types=1);

namespace App\Services;

use App\Entities\Cast\MoneyCast;
use App\Entities\Expense;
use App\Models\ExpenseModel;
use CodeIgniter\Model;

/**
 * @property ExpenseModel $entityModel
 */
class Expenses
{
    protected Model $entityModel;

    public function __construct()
    {
        $this->entityModel = model(ExpenseModel::class);
    }

    public function create(array $properties): ?Expense
    {
        $properties = $this->entityModel->filterAllowedFields($properties);

        // Change creation date, if the $properties came from the form
        if (isset($properties['created_at'])) {
            $properties['created_at'] = str_replace('T', ' ', $properties['created_at']);
        }

        // Since the money is stored in the smallest amount, you need to convert it
        $properties['amount'] = MoneyCast::set($properties['amount']);

        $expense  = new Expense($properties);
        $insertID = (int) $this->entityModel->insert($expense);

        // Set new expense ID
        if ($insertID > 0) {
            $expense->id = $insertID;

            return $expense;
        }

        return null;
    }

    public function delete(Expense $expense): bool
    {
        return $this->entityModel->delete($expense->id);
    }
}
