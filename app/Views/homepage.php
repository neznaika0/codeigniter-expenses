<?php

$this->setVar('title', lang('Home.homepage_title'));

echo $this->extend('_sections/layout');
echo $this->section('content');
?>
<hr>
<div class="h4">
    <div class="text-justify m-1">
        <?= lang('Home.welcome'); ?>
    </div>
    <div class="text-center">
        <a href="<?= route_to('expenses.list'); ?>" class="btn btn-primary"><?= lang('Home.demo'); ?></a>
        <a href="https://github.com/neznaika0/codeigniter-expenses" class="btn btn-secondary"><?= lang('Home.source'); ?></a>
    </div>
</div>
<hr>
<div class="h4">
    <div class="text-justify m-1">
        <?= lang('Home.contribute'); ?>
    </div>
    <div class="text-center">
        <a href="https://github.com/neznaika0/codeigniter-expenses/issues" class="btn btn-secondary">GitHub</a>
    </div>
</div>
<hr>
<?= $this->endSection(); ?>
