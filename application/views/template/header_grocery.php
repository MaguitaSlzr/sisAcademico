<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sistema Academico</title>
	<link rel="stylesheet" href="<?php echo base_url();?>resources/base/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>resources/base/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>resources/base/css/main.css">
	<?php 
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	
	<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
	
	<style type='text/css'>
	body{
		font-family: Arial;
		font-size: 14px;
	}
	a{
	    color: blue;
	    text-decoration: none;
	    font-size: 14px;
	}
	a:hover{
		text-decoration: underline;
	}
	</style>
</head>
<body>
<div class="wrapper">
	<div class="content">
		<div class="container">