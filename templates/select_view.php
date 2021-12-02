<?php
// Determine which tab is active for rendering.
$view_selectors = array(
  'list' => t('List'),
  'preview' => t('Preview'),
  'entities' => t('Entities'),
  'images' => t('Images'),
  'videos' => t('Videos'),
  'audios' => t('Audios'),
  'map' => t('Map'),
);

$analyse_dropdowns = array(
  'morphology' => t('Fuzzy search (variants)'),
  'entities' => t('Named entities'),
  'graph' => t('view_graph'),
  'trend' => t('view_trend'),
  'table' => t('Table'),
  'words' => t('Words'),
);

$tabs = [];
foreach ($view_selectors as $selector => $title) {
  $tab = [
    'class' => ['button', 'secondary'],
    'title' => $title,
    'onclick' => 'waiting_on();',
  ];

  switch ($selector) {
    case 'list':
      if ($view === 'preview') {
        // if switching back from preview mode to list, dont reset start to first result
        $pagestart = (floor(($start-1) / $limit_list) * $limit_list ) + 1;
        $tab['url'] = buildurl($params, 'view', NULL, 's', $pagestart);
      }
      else {
        // Switching from other view like images or table, so reset start to first result
        $tab['url'] = buildurl($params, 'view', NULL, 's', 1);
      }
      break;

    default:
      $tab['url'] = buildurl($params, 'view', $selector, 's', 1);
      break;
  }

  if ($view === $selector) {
    $tab['class'][] = 'active';
    $tab['url'] = '#';
  }

  $tabs[$selector] = $tab;
}

$analyse_items = [];
foreach ($analyse_dropdowns as $anl_item => $title) {
  $item = [
    'class' => ['button'],
    'title' => $title,
    'onclick' => 'waiting_on();',
  ];

  switch ($anl_item) {

    case 'morphology':
      $item['url'] = $cfg['morphology'] . rawurlencode($query);
      break;

    case 'table':
      $item['url'] = buildurl($params, 'view', $anl_item, 's', null);
      break;

    case 'trend':
      $item['url'] = buildurl($params, 'view', $anl_item, 's', null);
      break;

    case 'words':
      $item['url'] = buildurl($params, 'view', $anl_item, 's', null);
      break;

    case 'entities':
      $item['url'] = buildurl($params, 'view', 'entities', 's', null);
      break;

    case 'graph':
      $item['url'] = buildurl($params, 'view', 'graph', 's', null);
      break;
  }
  $analyse_items[$anl_item] = $item;
}
?>


<!-- Per View (List, Image, ...) Selector -->
<!--
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-poll-h"></i>
      <span>Results</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Specific results</h6>
        <?php foreach ($tabs as $selector => $detail): ?>
          <a class="collapse-item"
             href="<?= $detail['url'] ?>"><?= $detail['title'] ?></a>
        <?php endforeach; ?>
        <a class="collapse-item" title="Subscribe this search by RSS-Newsfeed" href="<?= $link_rss ?>"><?php echo t("Alert"); ?></a>
      </div>
    </div>
  </li>
-->


<!-- Analyse dropdown -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-chart-area"></i>
      <span>Analysis</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Analysis of results:</h6>
          <?php foreach ($analyse_items as $item => $detail): ?>
            <a class="collapse-item"
               href="<?= $detail['url'] ?>"><?= $detail['title'] ?></a>
          <?php endforeach; ?>
      </div>
    </div>
  </li>


