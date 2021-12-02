<?php

//
// Pagination
//
?>

<div class="pages" style="width:100%; text-align:center; font-weight: bold; color:#035ba8;" >
 <span style="float:left; padding-left: 25px;" > <?php include 'templates/select_sort.php'; ?> </span>
    <span
      class="pagination-previous <?php if (!$is_prev_page): print 'disabled'; endif; ?>">
      <?php if ($is_prev_page) { ?>
      <a onclick="waiting_on();" href="<?php print $link_prev; ?>">
        <?php } ?>


     <?php //print t('prev') ?>

        <?php if ($is_prev_page) { ?> <i class="fas fa-chevron-circle-left" style="font-size:large;"></i> </a> &nbsp; <?php } ?>

    </span>

    <span>

      <?php


      if (empty($query) and $start == 1) {
        ?>
        <?php echo t('newest_documents') ?>

        <?= $stat_limit ?>

        <?php echo t('newest_documents_of') ?>

        <?= $total ?>

        <?php echo t('newest_documents_of_total') ?>
        <?php

      }
      else {

        ?>

        <?php if ($view == "preview") { ?>

          <?php echo t('result'); ?>
          <?= $page ?>
          <?php echo t('result of'); ?>
          <?= $total ?>

        <?php } else { ?>
                
          <?php echo t('page'); ?>
          <?= $page ?>
          <?php echo t('page of'); ?>
          <?= $pages ?>
          (<?php echo t('results'); ?>

          <?= $start ?>
          <?php echo t('result to'); ?>
          <?= $end ?>
          <?php echo t('result of'); ?>
          <?= $total ?>
          )
          <?php
        }

      }


      ?>
    </span>

    <span
      class="pagination-next <?php if (!$is_next_page): print 'disabled'; endif; ?>">
      <?php if ($is_next_page) { ?>
      <a onclick="waiting_on();" href="<?php print $link_next; ?>">
        <?php } ?>

      <?php //print t('next') ?>
        <?php if ($is_next_page) { ?>&nbsp; <i class="fas fa-chevron-circle-right" style="font-size:large;"></i></a><?php } ?>

    </span>


</div>
