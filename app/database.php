<?php
$handle = fopen("lib/conf", "r");
$baris = array();
if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle);
		if (substr_count($buffer, 'user = ') > 0)
		{
		   $split = explode("user = ", $buffer);
		   $split2 = explode(";", $split[1]);
		   $user = $split2[0];
		}

		if (substr_count($buffer, 'password = ') > 0)
		{
		   $split = explode("password = ", $buffer);
		   $split2 = explode(";", $split[1]);
		   $pass = $split2[0];
		}

		if (substr_count($buffer, 'database = ') > 0)
		{
		   $split = explode("database = ", $buffer);
		    $split2 = explode(";", $split[1]);
		   $db = $split2[0];
		}
		
		$baris[] = $buffer; 
    }
    fclose($handle);
}
if (@$_GET['op'] == "simpan")
{
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  
  $db = $_POST['db'];  
$handle2 = fopen("lib/conf", "w");
$conf="user = ".$user.";
# isikan password user untuk akses ke MySQL
password = ".$pass.";
# isikan nama database untuk Gammu
database = ".$db.";\n";

  fwrite($handle2, $conf);
  fclose($handle2);

}
?>
<p>Masukkan konfigurasi Database</p>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>?page=db&op=simpan">
<table>
 <tr><td>USERNAME (MySQL)</td><td>:</td><td><input type="text" name="user" value="<?php echo $user;?>"></td></tr>
 <tr><td>PASSWORD (MySQL)</td><td>:</td><td><input type="text" name="pass" value="<?php echo $pass;?>"></td></tr>
 <tr><td>DATABASE </td><td>:</td><td><input type="text" name="db" value="<?php echo $db;?>"></td></tr>
</table>
<input type="submit" name="submit" value="Simpan">
</form>