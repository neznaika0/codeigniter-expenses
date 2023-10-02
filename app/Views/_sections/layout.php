<!DOCTYPE html>
<html lang="<?= $currentLocale ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ! empty($title) ? esc($title) : lang('Home.homepage_title'); ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/main.css'); ?>">
    <?= $this->renderSection('styles'); ?>
</head>
<body id="app__expenses">
    <div class="container">
        <div class="row">
            <header class="bg-light text-center rounded">
                <div><a href="<?= url_to('homepage'); ?>" class="h4">CI Expenses</a></div>
                <div class="h2"><?= lang('App.header_title'); ?></div>
                <?php if ($isLogged): ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= lang('App.menu'); ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= url_to('expenses.list'); ?>"><?= lang('Expense.list_expenses'); ?></a></li>
                            <li><a class="dropdown-item" href="<?= url_to('expenses.statistic'); ?>"><?= lang('Expense.statistic'); ?></a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?= url_to('logout'); ?>"><?= lang('Guard.logout'); ?></a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </header>

            <main class="rounded">
                <?= $this->renderSection('content'); ?>
            </main>

            <footer class="bg-light rounded">
                <div>
                    <a href="https://github.com/codeigniter4/framework" class="link-underline link-underline-opacity-0 link-underline-opacity-100-hover" target="_blank"><?= lang('App.based_framework', [$ciVersion]); ?></a>
                </div>
                <div>
                    <ul class="nav nav-underline">
                        <?php foreach($locales as $locale): ?>
                            <li class="nav-item">
                                <a class="nav-link<?= $locale === $currentLocale ? ' active' : ''; ?>" href="<?= route_to('homepage', $locale); ?>"><?= $locale; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </footer>
        </div>
    </div>

    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/main.js'); ?>"></script>
    <?= $this->renderSection('scripts'); ?>

    <?= $this->include('_sections/toasts'); ?>
</body>
</html>
