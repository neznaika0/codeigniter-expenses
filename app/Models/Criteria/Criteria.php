<?php

declare(strict_types=1);

namespace App\Models\Criteria;

class Criteria
{
    public const SORT_ASC  = 'ASC';
    public const SORT_DESC = 'DESC';

    public ?string $orderFields   = null;
    public ?string $orderEscaped  = null;
    public string $orderDirection = self::SORT_ASC;
    public ?int $perPage          = null;
    public ?int $page             = null;
    public int $segment           = 0;
    public string $group          = 'default';
    public int $limit             = 0;
    public int $offset            = 0;
}
