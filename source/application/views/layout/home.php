<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name='keyword' content="<?php echo isset($seo['keyword']) ? htmlspecialchars($seo['keyword']) : '';?>" />
<meta name='description' content="<?php echo isset($seo['description']) ? htmlspecialchars($seo['description']) : '';?>" />
<title><?php echo isset($seo['title']) ? htmlspecialchars($seo['title']) : '';?></title>
<meta name="viewport" content="width=device-width" />
<base href="<?php echo CIT_BASE_URL;?>" />

<link rel="stylesheet" type="text/css" href="public/template/css/standardform.css">
<link rel='stylesheet' href='public/template/css/home.css' />
<link rel='stylesheet' href='public/template/css/index.css' />
<script src='public/template/js/jquery-2.1.1.min.js'></script>
<script language='javascript' src="public/template/js/home.js" ></script>	

<?php 
	if ('dangky' == $template) {
		echo "<link rel='stylesheet' type='text/css' href='public/template/css/bootstrap.css'>";
		echo "<link rel='stylesheet' type='text/css' href='public/template/css/bootstrap.min.css'>";
		echo "<link rel='stylesheet' type='text/css' href='public/template/css/dangky.css'>";
	} else if ('home/index' == $template) {
		//echo "<link rel='stylesheet' href='public/template/js/home/responsiveslides.css'>";
		//echo "<link rel='stylesheet' href='public/template/css/home/demo.css'>";
		echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'></script>";
		echo "<script src='public/template/js/home/flux.min.js'></script>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js' type='text/javascript' charset='utf-8'></script>";
	}
?>
</head>

<body>

<?php 
	$this->load->view("layout/bluesky/top");
	$this->load->view ($template, isset($data)?$data:NULL);
	$this->load->view("layout/bluesky/bottom");
?>

</body>
</html>

