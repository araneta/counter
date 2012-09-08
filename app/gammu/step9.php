<?php

   echo "<b>Status :</b><br>";
   echo "<pre>";
   passthru("gammu-smsd -n phone1 -k");
   passthru("gammu-smsd -n phone2 -k");
   passthru("gammu-smsd -n phone3 -k");
   passthru("gammu-smsd -n phone4 -k");   
   echo "</pre>";
  
?> 
