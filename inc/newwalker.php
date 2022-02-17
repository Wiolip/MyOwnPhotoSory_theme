<?php



class Walker_Nav_Primary extends Walker_Nav_menu {

	function start_lvl( &$output, $depth ){ //ul
		$indent = str_repeat("\t",$depth);
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"sub-menu$submenu depth_$depth\">\n";
	}





}