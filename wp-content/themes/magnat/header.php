<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package dazzling
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,400i,600i,700i|Roboto:700&amp;subset=cyrillic" rel="stylesheet">

<?php $site_url = site_url() ?>

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $site_url?>/fav/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $site_url?>/fav/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $site_url?>/fav/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $site_url?>/fav/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $site_url?>/fav/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $site_url?>/fav/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $site_url?>/fav/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $site_url?>/fav/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $site_url?>/fav/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $site_url?>/fav/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $site_url?>/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $site_url?>/fav/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $site_url?>/fav/favicon-16x16.png">
<link rel="manifest" href="<?php echo $site_url?>/fav/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo $site_url?>/fav/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<?php wp_head(); ?>

</head>

<body <?php if(!is_front_page()) echo 'style="overflow-y:scroll;"'?>>
	<div id="body">