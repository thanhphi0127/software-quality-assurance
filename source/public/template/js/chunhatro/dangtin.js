$(document).ready(function(){
	
	  $( "tr.type" ).hide();
	  $( "tr.type.1st-type" ).show();
	$("#cbLoaiPhong" ).change(function() {
		var optvalue = $("#cbLoaiPhong option:selected").val();
		$( "tr.type" ).hide();
		if ('1' == optvalue)
			$( "tr.type.1st-type" ).show();
		else if ('2' == optvalue){
			$( "tr.type.1st-type" ).show();
			$( "tr.type.2nd-type" ).show();
		}
		else if ('3' == optvalue)
			$( "tr.type" ).show();
		 
			
	});
	$('span.hidethistype').click(function(){
		$(this).parent().parent().siblings().fadeToggle("slow");
	});
	
});
