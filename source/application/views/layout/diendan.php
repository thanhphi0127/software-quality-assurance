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
<link rel="stylesheet" type="text/css" href="public/template/css/home/bootstrap.css">

<link rel="stylesheet" type="text/css" href="public/template/css/home/home.css">
<script src='public/scripts/ckeditor/ckeditor.js'></script>
<!--<link rel="stylesheet" type="text/css" href="public/template/css/home/style.css">-->

	<?php
		if($template == 'diendan/demo')
		{
			echo "<link rel='stylesheet' type='text/css' href='public/template/assets/bootstrap.css' ";
		}
		else if($template == 'diendan/gopy')
		{
			echo "<link rel='stylesheet' type='text/css' href='public/template/assets/bootstrap.css' ";
		}

	?>

<body>

<?php 
	
	$this->load->view ($template, isset($data)?$data:NULL);

?>

</body>
</html>

