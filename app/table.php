<?php
require_once '../lib/master-data.php';
$code = isset($_GET['id'])?$_GET['id']:NULL;
$key = isset($_GET['key'])?$_GET['key']:NULL;
$pages = isset($_GET['pages'])?$_GET['pages']:NULL;
$action = isset($_GET['action'])?$_GET['action']:NULL;
$template= template_muat_data($code,$key,NULL, NULL,null, $pages, $dataPerPage = 10);
  foreach ($template['list'] as $key => $row){?>
				<tr><td><?=$row['id']?></td> 
                    <td><?=$row['tujuan']?></td> 
    				<td><?=$row['format']?></td> 
    				<td>
                    <a href="?page=template&action=edit&id=<?=$row['id']?>"><input type="image" src="images/icn_edit.png" title="Edit" ></a>
                      <a href="?page=template&action=delete&id=<?=$row['id']?>"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
				</tr> 
<?
}
?>