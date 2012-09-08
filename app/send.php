<?php
require_once 'lib/master-data.php';
$code = isset($_GET['id'])?$_GET['id']:NULL;
$key = isset($_GET['key'])?$_GET['key']:NULL;
$pages = isset($_GET['pages'])?$_GET['pages']:NULL;
$action = isset($_GET['action'])?$_GET['action']:NULL;
$template= template_muat_data($code,$key,NULL, NULL,null, $pages, $dataPerPage = 10);
?>

 
<header><h3>Template</h3>
		<ul class="tombol">
   			<li><a href="">Tambah</a></li>

		</ul>
</header>
<? if($action=='simpan'){
require_once 'lib/functions.php';
$tujuan=$_POST['tujuan'];
$format=$_POST['format'];
 if(isset($_POST['id'])&& $_POST['id']!=''){
        _update("update template set tujuan='$tujuan',format='$format' where id='$_POST[id]'");
    }else{
         _insert("insert into template (id,tujuan,format) values ('','$tujuan','$format')");
		  $id = _last_id();
    }
 
@header('location:'.  $_SERVER['PHP_SELF']."?page=template");
}

?>

			<header><h3>Tambah Template</h3></header>
			 <form action="<?php $_SERVER['PHP_SELF']; ?>?page=send&action=kirim" method="post" enctype="multipart/form-data">
<fieldset>

                            <label>Tujuan:</label>
							<input type="text" size="13" maxlength="13" id="tujuan" name="tujuan">
							<label>Format:</label>
							<input type="text" id="format" name="format">
                           
</fieldset>
						
		                    <label>&nbsp;</label>
                            <label>Catatan:Gunakan :hp untuk mengisikan no hp disaat transaksi nanti.</label>
                            <label>Contoh:Topup telkomsel :hp</label>
			<footer>
				<div class="submit_link">
<input type="submit" value="Tambah" class="alt_btn">
					<input type="submit" value="Reset">
				</div>
			</footer>
</form>
    <br/><br/>


	


    


