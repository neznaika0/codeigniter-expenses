<?php

$flashes = session()->getFlashdata();

$validationErrors = array_key_exists('validation', $flashes) ? $flashes['validation'] : [];
$allowedFlashKeys = ['success' => '', 'danger' => '', 'warning' => '', 'info' => ''];
$flashes          = array_filter($flashes, static fn ($key) => array_key_exists($key, $allowedFlashKeys), ARRAY_FILTER_USE_KEY);
?>
<?php if ($flashes !== [] || $validationErrors !== []): ?>
    <div class="toast-container top-0 end-0 p-3">
        <?php foreach ($validationErrors as $errorKey => $errorMessage): ?>
            <div class="toast text-bg-secondary fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="4000">
                <div class="d-flex">
                    <div class="toast-body">
                        &#128711; <?= esc($errorMessage); ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        <?php endforeach; ?>
        <?php foreach ($flashes as $flashKey => $flashMessage): ?>
            <div class="toast text-bg-<?= $flashKey; ?> fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="4000">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= $allowedFlashKeys[$flashKey]; ?> <?= esc($flashMessage); ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
