<div class="my-2">
    <?= form_open(url_to('expenses.new'), ['class' => 'row justify-content-center']); ?>
        <div class="col-auto">
            <div class="input-group mb-3">
                <?= form_input([
                    'id'          => 'expenseAmount',
                    'name'        => 'amount',
                    'class'       => 'form-control',
                    'value'       => set_value('amount'),
                    'placeholder' => lang('Expense.entity.amount'),
                    'autofocus'   => true,
                ]); ?>
                <span class="input-group-text">$</span>
                <?= form_input([
                    'id'          => 'expenseCreatedAt',
                    'name'        => 'created_at',
                    'type'        => 'datetime-local',
                    'class'       => 'form-control',
                    'value'       => set_value('created_at'),
                    'placeholder' => lang('Expense.entity.created_at'),
                ]); ?>
            </div>
            <div class="input-group">
                <?= form_textarea([
                    'id'          => 'expenseDescription',
                    'name'        => 'description',
                    'type'        => 'datetime-local',
                    'class'       => 'form-control',
                    'value'       => set_value('description'),
                    'rows'        => 3,
                    'placeholder' => lang('Expense.entity.description'),
                ]); ?>
            </div>
            <div class="input-group">
                <?= form_submit([
                    'name'  => 'createExpense',
                    'class' => 'btn btn-primary mt-2',
                    'value' => lang('App.button.new'),
                ]); ?>
            </div>
        </div>
    <?= form_close(); ?>
</div>
