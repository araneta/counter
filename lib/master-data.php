<?php
include_once "functions.php";

set_time_zone();
$database=connect();
mysql_connect('localhost',$database['user'], $database['pass']) or die ('can\'t connect mysql');
mysql_select_db($database['db'])or
	die("KONEKSI GAGAL : ".mysql_error());

$now = date('Y-m-d');
$lastmonth = date('Y-m-d', mktime(0, 0, 0, date("m") - 1, date("d"), date("Y")));
function inbox_muat_data($id=null,$key=null,$category = NULL, $sort = NULL,$sortBy=null, $page=NULL, $dataPerPage = NULL) {
 $where=null;
 if ($id != null) {
 $where = " where id = '$id'";
}
if($key != NULL){
       $cari = "where nama like ('%$key%') ";
      } else
      $cari='';
if (!empty($page)) {
        $noPage = $page;
    } else {
        $noPage = 1;
    }
    if (isset($dataPerPage) && $dataPerPage != null) {
        $offset = ($noPage - 1) * $dataPerPage;
        $batas = "limit $offset, $dataPerPage";
    } else {
        $batas = '';
        $offset = '';
    }
  $result = array();
   $sql="select * from inbox 
    $where $cari order by id DESC $batas";

if ($id != null) {
		$result =  _select_unique_result($sql);
                $result['list'] = _select_arr($sql);
                
	} else {
		$result['list'] = _select_arr($sql);
	}
	$sql="select * from inbox 
    $where $cari order by id DESC ";
	   $result['paging'] = paging($sql, $dataPerPage);
    $result['offset'] = $offset;
    $result['total'] = countrow($sql);
	   return $result;
}

function template_muat_data($id=null,$key=null,$category = NULL, $sort = NULL,$sortBy=null, $page=NULL, $dataPerPage = NULL) {
 $where=null;
 if ($id != null) {
 $where = " where id = '$id'";
}
if($key != NULL){
       $cari = "where format like ('%$key%') ";
      } else
      $cari='';
if (!empty($page)) {
        $noPage = $page;
    } else {
        $noPage = 1;
    }
	
    if (isset($dataPerPage) && $dataPerPage != null) {
        $offset = ($noPage - 1) * $dataPerPage;
        $batas = "limit $offset, $dataPerPage";
    } else {
        $batas = '';
        $offset = '';
    }
  $result = array();
   $sql="select * from template $where 
     $cari order by id ASC $batas";

if ($id != null) {
		$result =  _select_unique_result($sql);
                $result['list'] = _select_arr($sql);
                
	} else {
		$result['list'] = _select_arr($sql);
	}
	$sql="select * from template 
    $where $cari order by id ASC ";
	   $result['paging'] = pagination($sql, $dataPerPage);
    $result['offset'] = $offset;
    $result['total'] = countrow($sql);
	   return $result;
}

