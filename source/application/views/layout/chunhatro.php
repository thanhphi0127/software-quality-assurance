<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name='keyword' content="<?php echo isset($seo['keyword']) ? htmlspecialchars($seo['keyword']) : '';?>" />
<meta name='description' content="<?php echo isset($seo['description']) ? htmlspecialchars($seo['description']) : '';?>" />
<title><?php echo isset($seo['title']) ? htmlspecialchars($seo['title']) : '';?></title>
<meta name="viewport" content="width=device-width" />
<base href="<?php echo CIT_BASE_URL;?>" />
<script src='public/template/js/jquery-2.1.1.min.js'></script>

<link rel="stylesheet" type="text/css" href="public/template/css/home/home.css">
<link rel="stylesheet" type="text/css" href="public/template/css/home/style.css">
<link rel="stylesheet" type="text/css" href="public/template/css/home/bootstrap.css">

<?php
	if ($template == 'profile/profile')
	{
		echo "<link rel='stylesheet' type='tex/css' href='public/template/standardform.css'/>";
	}
	else if ('chunhatro/dangnhatro' == $template) 
	{
		echo "<link rel='stylesheet' type='text/css' href='public/template/css/chunhatro/style.css'/>";
		echo "<link rel='stylesheet' type='text/css' href='public/template/css/chunhatro/standardform.css'/>";
		
	} 
	/*else if ('chunhatro/vidu' == $template) 
	{
		echo "<link rel='stylesheet' type='text/css' href='public/template/css/style.css'/>";
		echo "<link rel='stylesheet' type='text/css' href='public/template/css/standardform.css'/>";
		
	} */
	else if ('chunhatro/gopy' == $template) 
	{
		echo "<link rel='stylesheet' type='text/css' href='public/template/assets/bootstrap.css' ";
		
	} 
?>
<body>

<?php 
	$this->load->view("layout/bluesky/chunhatro_top");
	$this->load->view ($template, isset($data)?$data:NULL);
	$this->load->view("layout/bluesky/bottom");
?>

</body>
</html>

