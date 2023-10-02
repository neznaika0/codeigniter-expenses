<?php

declare(strict_types=1);

namespace App\Entities;

use App\Entities\Cast\MoneyCast;
use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

/**
 * @property int    $amount
 * @property Time   $createdAt
 * @property string $description
 * @property int    $id
 */
class Expense extends Entity
{
    protected $datamap = [
        'createdAt' => 'created_at',
    ];
    protected $dates = [];
    protected $casts = [
        'id'         => 'int',
        'amount'     => 'int',
        'created_at' => 'datetime',
    ];

    public function __construct(?array $data = null)
    {
        parent::__construct($data);

        if (empty($data['created_at'])) {
            $this->createdAt = new Time();
        }
    }

    /**
     * @return float|int
     */
    public function getActualAmount()
    {
        return MoneyCast::get($this->amount);
    }
}
