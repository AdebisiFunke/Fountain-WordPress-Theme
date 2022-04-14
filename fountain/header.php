<?php

/**
 * The header for Fountain theme
 *
 * This is the template that displays all of the <head> section and everything up until <div >
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fountain
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php if (function_exists('wp_body_open')) {
        wp_body_open();
    } else {
        do_action('wp_body_open');
    } ?>
    <?php do_action('fountain_header_icon'); ?>
    <?php do_action('fountain_header_menu'); ?>
    <?php do_action('fountain_header_image');?>
    
  