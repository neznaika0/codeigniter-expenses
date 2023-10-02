<?php

use App\Entities\Cast\MoneyCast;
use App\Entities\Expense;
use CodeIgniter\Pager\Pager;

/**
 * @var ?Pager    $pager
 * @var Expense[] $expenses
 */
$this->setVar('title', lang('Expense.list_expenses'));

echo $this->extend('_sections/layout');
echo $this->section('content');
?>
<?php if ($expenses): ?>
    <?= $this->include('expense/_expense_add_form'); ?>
    <?= $pager->links('default', 'next_back_links'); ?>

    <div class="table-responsive">
        <table class="table table-hover  table-bordered table-sm text-center rounded">
            <thead class="table-info align-middle">
                <th style="min-width: 100px;">
                    <?= lang('Expense.entity.amount'); ?>
                </th>
                <th style="min-width: 120px;">
                    <?= lang('Expense.entity.created_at'); ?>
                </th>
                <th>
                    <?= lang('Expense.entity.description'); ?>
                </th>
                <th>
                    <?= lang('App.actions'); ?>
                </th>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach($expenses as $expense): ?>
                    <tr>
                        <td><?= number_format($expense->getActualAmount(), MoneyCast::PRECISION, '.', ' '); ?></td>
                        <td><?= $expense->createdAt->toLocalizedString('dd MMM YYYY, HH:mm'); ?></td>
                        <td><?= esc($expense->description); ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteExpense<?= $expense->id; ?>">
                                <?= lang('App.button.delete'); ?>
                            </button>
                        </td>
                    </tr>
                    <?= view_cell('App\Cells\ConfirmModal::deleteExpense', ['id' => $expense->id]); ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $pager->links('default', 'next_back_links'); ?>
<?php else: ?>
    <div class="alert alert-info"><?= lang('Expense.empty_list'); ?></div>
<?php endif; ?>
<?= $this->endSection(); ?>
