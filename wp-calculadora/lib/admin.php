<?php

//Administrador 
add_action( 'admin_menu', 'wpatg_plugin_menu' );
function wpatg_plugin_menu() {
	add_options_page( __('WP Calculadora', 'wp_calculadora'), __('WP Calculadora', 'wp_calculadora'), 'manage_options', 'wp_calculadora', 'wp_calculadora_page_settings');
}

function wp_calculadora_page_settings() { 
	?><h1><?php _e("Configuración WP Calculadora", 'wp_calculadora'); ?></h1><?php 
	if(isset($_REQUEST['send']) && $_REQUEST['send'] != '') { 
    ?><p style="border: 1px solid green; color: green; text-align: center;"><?php _e("Datos guardados correctamente.", 'wp_calculadora'); ?></p><?php
		update_option('_wp_calculadora_endpoint', $_POST['_wp_calculadora_endpoint']);
    if(isset($_POST['_wp_calculadora_actions']) && isset($_POST['_wp_calculadora_endpoint']) && $_POST['_wp_calculadora_endpoint'] != '') update_option('_wp_calculadora_actions', json_encode( wp_calculadora_remove_empty($_POST['_wp_calculadora_actions'])));
	} ?>
	<form method="post">
    <h3><?php _e("URL API", 'wp_calculadora'); ?></h3>
    <input type="text" name="_wp_calculadora_endpoint" value="<?=get_option('_wp_calculadora_endpoint'); ?>" style=" width: 90%;" />
    <?php if(get_option('_wp_calculadora_endpoint') != '') { ?>
      <h3><?php _e("Endpoints", 'wp_calculadora'); ?></h3>
      <table>
        <tr>
          <th colspan="3">Endpoint</th>
          <th><?php _e("Simbolo", 'wp_calculadora'); ?></th>
        </tr>
        <?php $actions = json_decode(get_option('_wp_calculadora_actions'), true);
          $items = ($actions < 5 ? 5 : (count($actions) + 1));
          for ($i = 0; $i < $items; $i++) { ?>
          <tr>
            <td><?=get_option('_wp_calculadora_endpoint'); ?></td>
            <td><input type="text" name="_wp_calculadora_actions[<?=$i; ?>][accion]" value="<?=(isset($actions[$i]['accion']) ? $actions[$i]['accion'] : ''); ?>" style=" width: 100%;" placeholder="<?php _e("Acción", 'wp_calculadora'); ?>" /></td>
            <td>/numero1/numero2</td>
            <td><input type="text" name="_wp_calculadora_actions[<?=$i; ?>][simbolo]" value="<?=(isset($actions[$i]['simbolo']) ? $actions[$i]['simbolo'] : ''); ?>" style=" width: 100%;" placeholder="<?php _e("Simbolo", 'wp_calculadora'); ?>" /></td>
          </tr>
        <?php } ?>
      </table>
    <?php } ?>
		<br/><input type="submit" name="send" class="button button-primary" value="<?php _e("Guardar", 'wp_calculadora'); ?>" />
	</form>
	<?php
}
function wp_calculadora_remove_empty($array) {
  return array_filter($array, 'wp_calculadora_remove_empty_internal');
}

function wp_calculadora_remove_empty_internal($item) {
  foreach ($item as $value) return !$value == "";
}
