<?php

// ----------
// Personalización de columnas en lista de Incrementos
// ----------
function incrementos_posts_columns($columns)
{
  // Retira las columnas por defecto de autor y título
  unset(
    $columns['author'],
    $columns['title'],
  );

  // Crea las nuevas columnas para agregar en la lista de posts cpt
  $new_columns = array(
    'cb'              => $columns['cb'],
    'obras_sociales'  => 'Obras Sociales',
    'date'            => $columns['date'],
    'fecha_vigencia'  => 'Entrada en Vigencia',
  );

  return array_merge($new_columns);
}

add_filter('manage_incrementos_posts_columns', 'incrementos_posts_columns');

/**
 * Custom columns in admin area for custom post types
 */

function incrementos_posts_custom_column($column, $post_id)
{
  switch ($column) {
    case 'obras_sociales':
      $terms = get_the_terms($post_id, 'obras-sociales');

      $terms_proc = [];

      foreach ($terms as $term) {
        array_push($terms_proc, $term->name);
      }

      $obras_sociales = join(', ', $terms_proc);

      echo '<a class="row-title" href="' . get_permalink() . '">' . $obras_sociales . '</a>';
      break;

    case 'fecha_vigencia':
      echo get_field('fecha_vigencia', $post_id);
      break;
  }
}

add_action("manage_incrementos_posts_custom_column", 'incrementos_posts_custom_column', 10, 2);

function incrementos_sortable_columns($columns)
{
  $columns['obras_sociales'] = 'obras_sociales';
  $columns['fecha_vigencia'] = 'fecha_vigencia';

  return $columns;
}

add_filter('manage_edit-incrementos_sortable_columns', 'incrementos_sortable_columns');
