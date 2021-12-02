<?php if ($view != "words" && $view != 'trend'): ?>
  <div id="sort" class="row float-right"  title="Sort by">
  <div class="dropdown no-arrow mb-4">
    <button class="btn btn-primary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style=" padding: 0px 4px 0px 4px;" >
      <i class="fas fa-sort-amount-down"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="<?= buildurl($params, "sort", NULL, 's', 1) ?>"><?= t('Relevance') ?></a>
      <a class="dropdown-item" href="<?= buildurl($params, "sort", 'newest', 's', 1) ?>"><?= t('Newest') ?></a>
      <a class="dropdown-item" href="<?= buildurl($params, "sort", 'oldest', 's', 1) ?>"><?= t('Oldest') ?></a>
    </div>
  </div>
  </div>
<?php endif; ?>

