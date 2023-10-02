<?php

$this->setVar('title', lang('Guard.login'));

echo $this->extend('_sections/layout');
echo $this->section('content');
?>
<div class="row justify-content-center py-3">
    <div class="col-md-6">
        <?= form_open(); ?>
            <?= form_password([
                'id'          => 'password',
                'name'        => 'password',
                'class'       => 'form-control',
                'placeholder' => lang('Guard.enter_password'),
                'autofocus'   => true,
            ]); ?>
            <?= form_submit([
                'name'  => 'signin',
                'class' => 'btn btn-primary mt-2',
                'value' => lang('Guard.button.sign_in'),
            ]); ?>
        <?= form_close(); ?>
    </div>
</div>
<?= $this->endSection(); ?>
