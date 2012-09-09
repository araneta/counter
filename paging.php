<?php
switch (@$_GET['page']){	
								
		case 'setting' 	: if(!file_exists ("app/gammu/step1.php")) 

						 	die ("file not found"); 

							include "app/gammu/step1.php"; 

							break;		
	   case 'db' 	: if(!file_exists ("app/database.php")) 

						 	die ("file not found"); 

							include "app/database.php"; 

							break;		
	   case 'about' 	: if(!file_exists ("app/about.php")) 

						 	die ("file not found"); 

							include "app/about.php"; 

							break;		
	   case 'template' 	: if(!file_exists ("app/template.php")) 

						 	die ("file not found"); 

							include "app/template.php"; 

							break;
	   case 'send' 	: if(!file_exists ("app/send.php")) 

						 	die ("file not found"); 

							include "app/send.php"; 

							break;				
	   case 'koneksigammu': if(!file_exists ("app/gammu/step2.php")) 

						 	die ("file not found"); 
                            include "app/gammu/menu2.php";
							?>


                          <header><h2>Langkah 2 - Test Koneksi GAMMU </h2></header>

                          <p>Klik tombol di bawah ini untuk cek koneksi GAMMU</p>
					
                        <input type="submit" name="submit" value="CEK KONEKSI" id="cek"></td></tr>
                        <div id="hasil"></div>
                         <br/>
                         tidak munculnya status setelah tombol diklik. Biasanya hal ini terjadi bagi Anda yang menggunakan OS Windows XP. Hal ini                         disebabkan adanya file di Windows yang hilang atau corrupt. Nama file tersebut adalah msvcr71.dll. cukup Anda copykan/save <a href="app/gammu/msvcr71.dll">file</a> di direktori C:\Windows\System32 kemudian restart PC nya.

<?
						break;	
							
		case 'step3' 	: if(!file_exists ("app/gammu/step3.php")) 

						  die ("file not found"); 

						  include "app/gammu/step3.php"; 

						  break;
						  	
		case 'step4' 	: if(!file_exists ("app/gammu/step4.php")) 

						  die ("file not found"); 
 
						  include "app/gammu/step4.php";
						  	
						  break;	 
							
		case 'step5' 	: if(!file_exists ("app/gammu/step5.php")) 

						 	die ("file not found"); 

						    include "app/gammu/menu2.php";
							?>

    <header><h2>Langkah 5 - Membuat Service GAMMU </h2></header>

                          <p>Klik tombol di bawah ini untuk membuat GAMMU Service!</p>
					
                        <input type="submit" name="submit" value="INSTALL SERVICE GAMMU" id="install"></td></tr>
                        <div id="hasil"></div>
                         <br/>

<?
							break;	
        case 'step6' 	: if(!file_exists ("app/gammu/step6.php")) 

						 	die ("file not found"); 

						    include "app/gammu/menu2.php";
							?>

    <header><h2>Langkah 6 - Menjalankan Service GAMMU</h2></header>

                          <p>Klik tombol di bawah ini untuk menjalankan GAMMU Service!</p>
					
                        <input type="submit" name="submit" value="START GAMMU" id="start"></td></tr>
                        <div id="hasil"></div>
                         <br/>

<?
							break;	
							
		case 'step7' 	: if(!file_exists ("app/gammu/step9.php")) 

						 	die ("file not found"); 

						    include "app/gammu/menu2.php";
							?>

    <header><h2>Langkah 7 - Menghentikan Service GAMMU</h2></header>

                          <p>Klik tombol di bawah ini untuk menghentikan GAMMU Service!</p>
					
                        <input type="submit" name="submit" value="STOP GAMMU" id="stop"></td></tr>
                        <div id="hasil"></div>
                         <br/>

<?
							break;	
							
	case 'step8' 	: if(!file_exists ("app/gammu/step10.php")) 

						 	die ("file not found"); 

						    include "app/gammu/menu2.php";
							?>

    <header><h2>Langkah 8 - Menghapus Service GAMMU</h2></header>

                          <p>Klik tombol di bawah ini untuk menghapus GAMMU Service!</p>
					
                        <input type="submit" name="submit" value="STOP GAMMU" id="uninstall"></td></tr>
                        <div id="hasil"></div>
                         <br/>

<?
							break;	
default:
      include "app/inbox.php"; 		
							}
?>