<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.2.0.0-beta1
 */

if (!is_active_sidebar('sidebar-imprenta')) {
  return;
}
?>

  <aside id="secondary" class="widget-area">
    <?php dynamic_sidebar('sidebar-imprenta'); ?>
  </aside><!-- #secondary -->
