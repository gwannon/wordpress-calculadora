<?php 

// Códigos cortos --------------------------------------
function wp_calculadora_shortcode ($params = array(), $content = null) {
  global $post;
  ob_start();
  wp_enqueue_script('wp_calculadora_script');
  wp_enqueue_style('wp_calculadora_styles');
  $buttons = [
		9 => "",
		8 => "",
		7 => "",
		6 => "",
		5 => "",
		4 => "",
		3 => "",
		2 => "",
		1 => "",
		"."	=> "",
		0 => "",
		"=" => "calculate"
  ]; 
  $actions = json_decode(get_option('_wp_calculadora_actions'), true);
  foreach ($actions as  $action) { $buttons[$action['simbolo']] = $action['accion']; } ?> 
  <div id="calculadora">
  	<div>0</div>
  	<?php foreach($buttons as $key => $action) {?>
  	  <button<?=($action != '' ? ' data-accion="'.$action.'"' : ''); ?>><?=$key ?></button>
  	<?php } ?>
  </div>
  <?php return ob_get_clean();
}
add_shortcode('calculadora', 'wp_calculadora_shortcode');

