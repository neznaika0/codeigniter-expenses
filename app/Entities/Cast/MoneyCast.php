<?php

declare(strict_types=1);

namespace App\Entities\Cast;

use CodeIgniter\Entity\Cast\BaseCast;

class MoneyCast extends BaseCast
{
    /**
     * When the calculation is carried out in dollars, you need to specify how many cents in one dollar
     */
    public const MIN_RATIO = 100;

    public const PRECISION = 2;

    /**
     * @param mixed $value
     *
     * @return float|int
     */
    public static function get($value, array $params = [])
    {
        return $value / self::MIN_RATIO;
    }

    /**
     * @param mixed $value
     *
     * @return int
     */
    public static function set($value, array $params = [])
    {
        // Formatting a number up to N digits without rounding
        if (($dotPosition = strpos($value, '.')) !== false) {
            $value = substr($value, 0, $dotPosition + 1 + self::PRECISION);
        }

        return (int) ($value * self::MIN_RATIO);
    }
}
