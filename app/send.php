<?php
require_once 'lib/master-data.php';
$code = isset($_GET['id'])?$_GET['id']:NULL;
$key = isset($_GET['key'])?$_GET['key']:NULL;
$pages = isset($_GET['pages'])?$_GET['pages']:NULL;
$action = isset($_GET['action'])?$_GET['action']:NULL;
$outbox= outbox_muat_data($code,$key,NULL, NULL,null, $pages, $dataPerPage = 10);
?>

 
<header><h3>Outbox</h3>

</header>
<? if($action=='resend'){
require_once 'lib/functions.php';
foreach ($outbox['list'] as $key => $data):
 if(isset($_GET['id'])&& $_GET['id']!=''){
   _insert("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$data[DestinationNumber]', '$data[TextDecoded]', 'Myphone1')");
  mysql_query("DELETE FROM sentitems where ID = $_GET[id]");

    }
endforeach;
@header('location:'.  $_SERVER['PHP_SELF']."?page=send");
}

?>
<table class="tablesorter" cellspacing="0" id="tabel"> 
			<thead> 
				<tr> 
   				
    				<th>Waktu</th> 
                    <th>Tujuan</th> 
                    <th>Pesan</th> 
    				<th>Status</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
            
			<tbody> 
            
 <? if($outbox['total']!='0'){ 

foreach ($outbox['list'] as $key => $row){?>
				<tr><td><?=deletetime($row['SendingDateTime'])?></td> 
                     <td><?=$row['DestinationNumber']?></td> 
                    <td><?=$row['TextDecoded']?></td> 
    				<td><?=$row['Status']?></td> 
    				<td>
                     <a href="?page=send&action=resend&id=<?=$row['ID']?>"><input type="image" src="images/icn_jump_back.png" title="Resend"></a>
                       </td> 
				</tr> 
<?
}
}
 
	  else{
	  ?>
      <tr><td colspan="5"><div align="center">Data Masih Kosong</div></td></tr>
	  <?
	  }
	  ?>
</tbody> 
			</table>
            <br/>
            Yang ditampilkan hanya pesan yang tidak terkirim <br/>
             <div align="center">
      <?
	  echo $outbox['paging'];?>
      </div>
    
<br/>