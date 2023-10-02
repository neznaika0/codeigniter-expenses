<?php

use App\Entities\Cast\MoneyCast;
use CodeIgniter\I18n\Time;

$this->setVar('title', lang('Expense.statistic'));

echo $this->extend('_sections/layout');
echo $this->section('content');
?>
<div class="table-responsive mt-3">
    <table class="table table-hover table-sm text-center">
        <thead class="table-info align-middle">
            <th>
                <?= lang('Expense.statistic_table.year'); ?>
            </th>
            <th style="min-width: 120px;">
                <?= lang('Expense.statistic_table.month'); ?>
            </th>
            <th style="min-width: 100px;">
                <?= lang('Expense.statistic_table.amount'); ?>
            </th>
        </thead>
        <tbody class="table-group-divider">
        <?php foreach($yearGroup as $monthStat): ?>

            <?php $monthName = (Time::createFromFormat('!m', $monthStat->month))->format('F'); ?>
                <tr>
                    <td><?= (int) $monthStat->year; ?></td>
                    <td><?= $monthName; ?></td>
                    <td><?= number_format($monthStat->amount, MoneyCast::PRECISION, '.', ' '); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>
