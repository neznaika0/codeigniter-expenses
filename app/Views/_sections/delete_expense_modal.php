<div class="modal fade" id="deleteExpense<?= $id; ?>" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5"><?= lang('Expense.modal.delete_header'); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><?= lang('Expense.modal.delete_message', [$id]); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= lang('App.button.close'); ?></button>
                <?= form_open(url_to('expenses.delete')); ?>
                    <?= form_hidden('id', $id); ?>
                    <?= form_submit([
                        'name'  => 'deleteExpense',
                        'class' => 'btn btn-danger',
                        'value' => lang('App.button.delete'),
                    ]); ?>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
