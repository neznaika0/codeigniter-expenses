<?php
/** @var CodeIgniter\Pager\PagerRenderer $pager */
$pager->setSurroundCount(2);

if ($pager->getPageCount() > 1): ?>
	<nav aria-label="<?= lang('Pager.pageNavigation'); ?>">
		<ul class="pagination justify-content-center">
			<?php if ($pager->hasPreviousPage()) : ?>
				<li class="page-item">
					<a class="page-link" href="<?= $pager->getPreviousPage(); ?>" aria-label="<?= lang('Pager.previous'); ?>">
						<?= lang('Pager.previous'); ?>
					</a>
				</li>
			<?php endif ?>

			<li class="page-item">
				<div class="page-link disabled" href="#" aria-label="<?= lang('Pager.next'); ?>">
					<?= $pager->getCurrentPageNumber(); ?> / <?= $pager->getPageCount(); ?>
				</div>
			</li>

			<?php if ($pager->getNextPage()) : ?>
				<li class="page-item">
					<a class="page-link" href="<?= $pager->getNextPage(); ?>" aria-label="<?= lang('Pager.next'); ?>">
						<?= lang('Pager.next'); ?>
					</a>
				</li>
			<?php endif ?>
		</ul>
	</nav>
<?php endif ?>
