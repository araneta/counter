<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>jogjaweb.in</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>

<script type="text/javascript" src="js/js/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function() 
{ 
                   $('#cek').click(function(){
                    $.ajax({
				    url: "app/gammu/step2.php",
					type:'GET',
					dataType:'html',
                       success: function(msg){
                    $('#hasil').html(msg);
					                 }
			                });	
			      	});		
					
$('#install').click(function(){
 $.ajax({
				    url: "app/gammu/step5.php",
					type:'GET',
					dataType:'html',
                       success: function(msg){
                    $('#hasil').html(msg);
					}
				});	
				});		
$('#start').click(function(){
 $.ajax({
				    url: "app/gammu/step6.php",
					type:'GET',
					dataType:'html',
                       success: function(msg){
                    $('#hasil').html(msg);
					}
				});	
				});		
$('#stop').click(function(){
 $.ajax({
				    url: "app/gammu/step9.php",
					type:'GET',
					dataType:'html',
                       success: function(msg){
                    $('#hasil').html(msg);
					}
				});	
				});	
$('#uninstall').click(function(){
 $.ajax({
				    url: "app/gammu/step10.php",
					type:'GET',
					dataType:'html',
                       success: function(msg){
                    $('#hasil').html(msg);
					}
				});	
				});	
												
	});		
	<? if  (isset($_GET['page'])){?>
	$(document).ready (function () {
    var updater = setTimeout(function () {
        $('#tabel').load ('<?=$_SERVER['PHP_SELF']."?page=".$_GET['page']?> #tabel');
    }, 10);
});
<? } ?>
	$(document).ready (function () {
    var updaters = setInterval(function () {
        $('#sms').load ('<?=$_SERVER['PHP_SELF']?> #sms');
    }, 10000);
});

	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>

<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="http://jogjaweb.in">Jogjaweb.in</a></h1>
		  <h2 class="section_title">&nbsp;</h2><div class="btn_view_site"><a href="http://www.jogjaweb.in">View Site</a></div>
	  </hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Administrator</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php">Home</a> <div class="breadcrumb_divider"></div> <a class="current"><?=@$_GET['page']?></a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
        	<h3>SMS</h3>
		<ul class="toggle">
			
			<li class="icn_view_users"><a href="index.php">Inbox</a></li>
			<li class="icn_profile"><a href="?page=template">Template</a></li>
            <li class="icn_add_user"><a href="?page=send">Outbox</a></li>
		</ul>
		<h3>Setting</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="?page=setting">Gammu</a></li>
			<li class="icn_edit_article"><a href="?page=db">Database</a></li>
			<li class="icn_categories"><a href="?page=about">About</a></li>
		</ul>
	
        <!--
		<h3>Media</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">File Manager</a></li>
			<li class="icn_photo"><a href="#">Gallery</a></li>
			<li class="icn_audio"><a href="#">Audio</a></li>
			<li class="icn_video"><a href="#">Video</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">Options</a></li>
			<li class="icn_security"><a href="#">Security</a></li>
			<li class="icn_jump_back"><a href="#">Logout</a></li>
		</ul>
        -->
        
		<footer>
			<hr />
		    	<p><a href="http://www.kaskus.co.id/showthread.php?t=16143892"><img src="images/kakus.png" width="202" height="49"></a></p>
			<p><a href="http://www.medialoot.com"><img src="images/logo.png" width="202" height="49"></a></p>
            <P><a href="https://github.com/orankaneh/counter"><img src="images/github-logo.png" width="151" height="59"></a></P>
            	<p><strong>Copyright &copy; 2012 Jogjaweb.in</strong></p>
	  </footer>
        <hr />
	</aside><!-- end of sidebar -->

	<section id="main" class="column">
		
		<h4 class="alert_info">Free Smsgateway Pengisian Pulsa By jogjaweb.in</h4>
	
		<article class="module width_full">
			
		<?php include_once "paging.php";?>
        
				</article>
                </section>



</body>

</html>