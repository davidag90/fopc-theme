<?php

/**
 * WooCommerce Customizations 
 */
add_action('woocommerce_after_order_notes', 'custom_checkout_file_upload');

function custom_checkout_file_upload()
{
  echo '<h3>Personalización</h3>';
  echo '<p>Adjunte aquí archivos/fotos de sus diseños o logotipos propios</p>';
  echo '<p class="form-row form-row-wide"><label for="img_personalizada">Seleccionar archivos</label><span class="woocommerce-input-wrapper"><input type="file" id="img_personalizada" name="img_personalizada[]" accept=".jpg,.jpeg,.png,.pdf" multiple><input type="hidden" name="img_personalizada_field"></span></p>';

  wc_enqueue_js(
    "$('#img_personalizada').change( function() {
        if ( this.files.length ) {
          const formData = new FormData();
          $.each(this.files, function(i, file) {
            formData.append('img_personalizada[]', file);
          });
          $.ajax({
            url: wc_checkout_params.ajax_url + '?action=imgupload',
            type: 'POST',
            data: formData,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function ( response ) {
              $( 'input[name=\"img_personalizada_field\"]' ).val( response );
            },
            error: function(xhr, status, error) {
              console.log('Error al subir los archivos: ' + error);
            }
          });
        }
      });"
  );
}

add_action('wp_ajax_imgupload', 'custom_img_upload');
add_action('wp_ajax_nopriv_imgupload', 'custom_img_upload');

function custom_img_upload()
{
  $upload_dir = wp_upload_dir();
  $files = $_FILES['img_personalizada'];
  $uploaded_files = array();

  foreach ($files['name'] as $key => $value) {
    if ($files['error'][$key] === 0) {
      $file_name = sanitize_file_name($files['name'][$key]);
      $file_temp = $files['tmp_name'][$key];
      $file_dest = $upload_dir['path'] . '/' . $file_name;

      if (move_uploaded_file($file_temp, $file_dest)) {
        $uploaded_files[] = $upload_dir['url'] . '/' . $file_name;
      }
    }
  }

  echo json_encode($uploaded_files);
  wp_die();
}

add_action('woocommerce_checkout_update_order_meta', 'save_custom_img_field');

function save_custom_img_field($order_id)
{
  if (!$order_id) {
    return;
  }

  $order = wc_get_order($order_id);

  if (!empty($_POST['img_personalizada_field'])) {
    $files = json_decode(stripslashes($_POST['img_personalizada_field']), true);

    if (is_array($files)) {
      update_post_meta($order_id, '_img_personalizada_files', $files);
    }
  }
}

add_action('woocommerce_admin_order_data_after_billing_address', 'show_custom_img_field', 10, 1);

function show_custom_img_field($order)
{
  $files = get_post_meta($order->get_id(), '_img_personalizada_files', true);
  if (!empty($files)) {
    echo '<h3>Archivos personalizados</h3>';
    echo '<ul>';
    foreach ($files as $file) {
      echo '<li><a href="' . esc_url($file) . '" target="_blank">' . basename($file) . '</a></li>';
    }
    echo '</ul>';
  }
}

add_filter('woocommerce_email_attachments', 'attach_custom_img_files_admin_email', 10, 3);

function attach_custom_img_files_admin_email($attachments, $email_id, $order)
{
  if ($email_id === 'new_order') {
    // Obtén el ID de la orden
    $order_id = $order->get_id();

    // Obtén los archivos de la metadata de la orden
    $files = get_post_meta($order_id, '_img_personalizada_files', true);

    if (is_array($files) && !empty($files)) {
      foreach ($files as $file_url) {
        $file_path = str_replace(wp_upload_dir()['baseurl'], wp_upload_dir()['basedir'], $file_url);

        if (file_exists($file_path)) {
          $attachments[] = $file_path;
        }
      }
    }
  }

  return $attachments;
}

/**
 * Custom class for product categories widget links (Bootstrap adaptation)
 */

function custom_product_cat_class($output, $args)
{
  if (is_active_widget(false, false, 'woocommerce_product_categories', true) && isset($args['taxonomy']) && $args['taxonomy'] === 'product_cat') {
    $output = str_replace('<a', '<a class="link-light"', $output);
  }
  return $output;
}

add_filter('wp_list_categories', 'custom_product_cat_class', 10, 2);
