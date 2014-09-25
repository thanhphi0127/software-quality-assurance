<?php
if (! function_exists('common_postvalue')){
	function common_postvalue($value){
		return (! empty($value)? htmlspecialchars($value) : '');
	}
}

if (! function_exists('common_showerror')){
	function common_showerror($error){
		return (isset($error) ? '<ul class = "error">'.$error.'</ul>' : '');
	}
}

if (! function_exists('common_randvalue')){
	function common_randvalue(){
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randstring = '';
		for ($i = 0; $i < CIT_PASS_LENGTH; $i++) {
			$randstring = $randstring.($characters[rand(0, strlen($characters)-1)]);
		}
		return $randstring;
	}
}
