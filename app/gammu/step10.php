<?php

   echo "<b>Status :</b><br>";
   echo "<pre>";
   passthru("gammu-smsd -u -n phone1 ", $hasil);
   passthru("gammu-smsd -u -n phone2 ", $hasil);
   passthru("gammu-smsd -u -n phone3 ", $hasil);
   passthru("gammu-smsd -u -n phone4", $hasil);   
   
   echo "</pre>";
 
?> 
