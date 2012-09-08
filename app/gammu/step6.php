
<?php

   echo "<b>Status :</b><br>";
   echo "<pre>";
   passthru("gammu-smsd -c smsdrc1 -n phone1 -s");
   passthru("gammu-smsd -c smsdrc2 -n phone2 -s");
   passthru("gammu-smsd -c smsdrc3 -n phone3 -s");
   passthru("gammu-smsd -c smsdrc4 -n phone4 -s");   
   echo "</pre>";

?> 
