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
   			<li><a href="?page=template&action=add">Tambah</a></li>

		</ul>
</header>
<? if($action=='simpan'){
require_once 'lib/functions.php';
$tujuan=$_POST['tujuan'];
$format=$_POST['format'];
$nama=$_POST['nama'];
 if(isset($_POST['id'])&& $_POST['id']!=''){
        _update("update template set nama='$nama',tujuan='$tujuan',format='$format' where id='$_POST[id]'");
    }else{
         _insert("insert into template (id,nama,tujuan,format) values ('','$nama','$tujuan','$format')");
		  $id = _last_id();
    }
 
@header('location:'.  $_SERVER['PHP_SELF']."?page=template");
}
if($action=='kirim'){
require_once 'lib/functions.php';
$tujuan=$_POST['tujuan'];
$format=$_POST['format'];
$hp=$_POST['hp'];
$pengganti=":hp";
$pesan=str_replace($pengganti, $hp, $format);


         _insert("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$tujuan', '$pesan', 'Myphone1')");
		 
 
 
@header('location:'.  $_SERVER['PHP_SELF']."?page=template");
}
if($action=='add'){
?>

			<header><h3>Tambah Template</h3></header>
			 <form action="<?php $_SERVER['PHP_SELF']; ?>?page=template&action=simpan" method="post" enctype="multipart/form-data">
<fieldset>
                             <label>Nama:</label>
							<input type="text" size="13" maxlength="13" id="nama" name="nama">
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
<?
}
if($action=='delete'){
   mysql_query("DELETE FROM template where id = $_GET[id]");
   @header('location:'.  $_SERVER['PHP_SELF']."?page=template");
  }
if($action=='edit'){
foreach ($template['list'] as $key => $rowz):
?>

			<header><h3>Edit Template</h3></header>
			 <form action="<?php $_SERVER['PHP_SELF']; ?>?page=template&action=simpan" method="post" enctype="multipart/form-data">
<fieldset>
                            <label>Nama:</label>
							<input type="text" id="nama" name="nama" value="<?=$rowz['nama']?>" readonly="readonly">

                            <label>Tujuan:</label>
							<input type="text" size="13" maxlength="13" id="tujuan" name="tujuan" value="<?=$rowz['tujuan']?>">
							<label>Format:</label>
							<input type="text" id="format" name="format" value="<?=$rowz['format']?>">
                            <input type="hidden" id="id" name="id" value="<?=$rowz['id']?>">
                           
</fieldset>
						
		                    <label>&nbsp;</label>
                            <label>Catatan:Gunakan :hp untuk mengisikan no hp disaat transaksi nanti.</label>
                            <label>Contoh:Topup telkomsel :hp</label>
			<footer>
				<div class="submit_link">
<input type="submit" value="Update" class="alt_btn">
					<input type="submit" value="Reset">
				</div>
			</footer>
</form>
    <br/><br/>
<?
endforeach;
}
if($action=='send'){
foreach ($template['list'] as $key => $rowz):
$pengganti=":hp";
$diganti="<input type='text' id='hp' name='hp'>";
?>

			<header><h3>Kirim Pesan</h3></header>
			 <form action="<?php $_SERVER['PHP_SELF']; ?>?page=template&action=kirim" method="post" enctype="multipart/form-data">
<table width="100%">
 <tr>
    <td>Nama</td>
    <td><input type="text"  id="nama" name="nama" value="<?=$rowz['nama']?>" readonly="readonly"></td>
  </tr>
  <tr>
    <td>Tujuan</td>
    <td><input type="text" size="13" maxlength="13" id="tujuan" name="tujuan" value="<?=$rowz['tujuan']?>" readonly="readonly"></td>
  </tr>
  <tr>
    <td>Pesan:</td>
    <td>	<input type="hidden"  id="format" name="format" value="<?=$rowz['format']?>" readonly="readonly"><?= str_replace($pengganti, $diganti, $rowz['format']);?></td>
  </tr>
</table>



                         
							
						
                            
                            <input type="hidden" id="id" name="id" value="<?=$rowz['id']?>">
                           

						
		                  
			<footer>
				<div class="submit_link">
<input type="submit" value="Kirim" class="alt_btn">
					<input type="submit" value="Reset">
				</div>
			</footer>
</form>
    <br/><br/>
<?
endforeach;
}
?>

<table class="tablesorter" cellspacing="0" id="tabel"> 
			<thead> 
				<tr> 
   				
    				<th>Id</th> 
                    <th>Nama</th> 
                    <th>Tujuan</th> 
    				<th>Format</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
            
			<tbody> 
            
 <? if($template['total']!='0'){ 

foreach ($template['list'] as $key => $row){?>
				<tr><td><?=$row['id']?></td> 
                     <td><?=$row['nama']?></td> 
                    <td><?=$row['tujuan']?></td> 
    				<td><?=$row['format']?></td> 
    				<td>
                     <a href="?page=template&action=send&id=<?=$row['id']?>"><input type="image" src="images/icn_jump_back.png" title="Send"></a>
                    <a href="?page=template&action=edit&id=<?=$row['id']?>"><input type="image" src="images/icn_edit.png" title="Edit" ></a>
                      <a href="?page=template&action=delete&id=<?=$row['id']?>"><input type="image" src="images/icn_trash.png" title="Trash"></a>
                       </td> 
				</tr> 
<?
}
}
 
	  else{
	  ?>
      <tr><td colspan="4"><div align="center">Data Masih Kosong</div></td></tr>
	  <?
	  }
	  ?>
</tbody> 
			</table>
      <?
	  echo $template['paging'];?>
    


