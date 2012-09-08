<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" dir="ltr">
<head>
<title>Experiments | jQuery Expand/Collapse - demo</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="en" />
<meta name="language" content="en" />
<meta name="robots" content="index, follow" />
<meta name="author" content="Adriana Palazova - adipalaz.com" />

<!--[if lte IE 7]>
<style type="text/css">
h2 a, .demo {position:relative; height:1%}
</style>
<![endif]-->

<!--[if lte IE 6]>
<script type="text/javascript">
   try { document.execCommand( "BackgroundImageCache", false, true); } catch(e) {};
</script>
<![endif]-->
<!--[if !lt IE 6]><!-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="script/expand.js"></script>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
$(function() {
    // --- Using the default options:
    $("h2.expand").toggler();
    // --- Other options:
    //$("h2.expand").toggler({method: "toggle", speed: 0});
    //$("h2.expand").toggler({method: "toggle"});
    //$("h2.expand").toggler({speed: "fast"});
    //$("h2.expand").toggler({method: "fadeToggle"});
    //$("h2.expand").toggler({method: "slideFadeToggle"});    
    $("#content").expandAll({trigger: "h2.expand", ref: "div.demo", localLinks: "p.top a"});
});
//--><!]]>
</script>
<!--<![endif]-->
</head>

<body>
    <div id="wrapper"> 
      <div id="content">  
        <h1 class="heading">jQuery experiments: Expand/Collapse demo</h1>
          <div class="demo">
            <h2 class="expand">Title 1</h2>
            <div class="collapse">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore 
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa 
                qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore 
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa 
                qui officia deserunt mollit anim id est laborum.</p>
                <p class="top"><a href="#content">Top of page</a></p>
            </div>
            <h2 class="expand">Title 2</h2>
            <div class="collapse">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore 
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa 
                qui officia deserunt mollit anim id est laborum.</p>
                <p class="top"><a href="#content">Top of page</a></p>
            </div>
            <h2 class="expand">Title 3</h2>
            <div class="collapse">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore 
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa 
                qui officia deserunt mollit anim id est laborum.</p>
                <p class="top"><a href="#content">Top of page</a></p>
            </div>
            <h2 class="expand">Title 4</h2>
            <div class="collapse">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore 
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa 
                qui officia deserunt mollit anim id est laborum.</p>
                <p class="top"><a href="#content">Top of page</a></p>
            </div>
			 <h2 class="expand">Title 400</h2>
            <div class="collapse">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore 
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa 
                qui officia deserunt mollit anim id est laborum.</p>
                <p class="top"><a href="#content">Top of page</a></p>
            </div>
            <h2 class="expand">Title 5</h2>
            <div class="collapse">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore 
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa 
                qui officia deserunt mollit anim id est laborum.</p>
                <p class="top"><a href="#content">Top of page</a></p>
            </div>
          </div>
        </div>
    </div>
</body>
</html>