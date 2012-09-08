<style type="text/css">
<!--
.style1 {font-family: "Courier New", Courier, monospace}
-->
</style>
<span class="style1">
<?php

   echo "<b>Status :</b><br>";
   echo "<hr>Modem/HP 1<br>";
   echo "<pre>";
   passthru("gammu -s 0 -c gammurc identify", $hasil);
   echo "</pre>";
   echo "<hr>Modem/HP 2<br>";
   echo "<pre>";
   passthru("gammu -s 1 -c gammurc identify", $hasil);
   echo "</pre>";
   echo "<hr>Modem/HP 3<br>";
   echo "<pre>";
   passthru("gammu -s 2 -c gammurc identify", $hasil);
   echo "</pre>";
   echo "<hr>Modem/HP 4<br>";
   echo "<pre>";
   passthru("gammu -s 3 -c gammurc identify", $hasil);
   echo "</pre>";


?>


</span><br />
