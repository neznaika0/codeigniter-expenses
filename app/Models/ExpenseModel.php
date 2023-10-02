<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Cast\MoneyCast;
use App\Entities\Expense;
use App\Models\Criteria\Criteria;
use App\Models\Criteria\ExpenseCriteria;
use CodeIgniter\Model;

class ExpenseModel extends Model
{
    protected $table            = 'expense';
    protected $primaryKey       = 'id';
    protected $returnType       = Expense::class;
    protected $useTimestamps    = false;
    protected $skipValidation   = true;
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'amount', 'created_at', 'description',
    ];

    /**
     * @param ExpenseCriteria $criteria
     *
     * @return Expense[]
     */
    public function findForListing(?Criteria $criteria): array
    {
        return $this->sortClause($criteria)->paginate();
    }

    /**
     * @return Expense[]
     */
    public function findYearGroup(int $year = 0): array
    {
        $builder = $this->builder()
            ->select('SUM(amount / ' . MoneyCast::MIN_RATIO . ') as amount, YEAR(created_at) as year, MONTH(created_at) as month');

        if ($year > 0) {
            $builder->where('YEAR(created_at)', $year);
        }

        return $builder->orderBy('created_at', 'DESC')
            ->groupBy('DATE_FORMAT(created_at, "%Y-%m")', false)
            ->get(100)->getResultObject();
    }

    /**
     * Return only available fields from another array
     */
    public function filterAllowedFields(array $inputFields): array
    {
        $allowedFields = array_flip($this->allowedFields);

        return array_filter($inputFields, static fn ($key) => array_key_exists($key, $allowedFields), ARRAY_FILTER_USE_KEY);
    }

    protected function sortClause(?Criteria $criteria): self
    {
        if ($criteria && ! empty($criteria->orderFields)) {
            $this->orderBy($criteria->orderFields, $criteria->orderDirection, $criteria->orderEscaped);
        }

        return $this;
    }
}
