<html>
<head>
  <title>Kenalan dengan jQuery bag 2</title>
  <script language="javascript" src='../jq/js/jquery-1.4.4.min.js'></script>

  <script type='text/javascript'>

	$(document).ready(function(){
		$(".text_class").hide();
	});

	$(function(){

		$("#tombol_spoiler").click(function(){
			$(".text_class").slideToggle(1000,function(){
				var cek = $("#tombol_spoiler").val();
				if(cek=="Hide")
					$("#tombol_spoiler").val('Show');
				else
					$("#tombol_spoiler").val('Hide');
					
        return false;
			});
		});

	});

  </script>
</head>

<body>

			<input type='button' id='tombol_spoiler' value='Show'>
	  <div class='text_class'> jquery</div>
	  <div class='text_class'> jquery</div>

</body>

</html>
