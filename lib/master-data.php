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
   $sql="select * from inbox $where 
    $where $cari order by id DESC $batas";

if ($id != null) {
		$result =  _select_unique_result($sql);
                $result['list'] = _select_arr($sql);
                
	} else {
		$result['list'] = _select_arr($sql);
	}
	$sql="select * from inbox $where 
    $where $cari order by id DESC ";
	   $result['paging'] = paging($sql, $dataPerPage);
    $result['offset'] = $offset;
    $result['total'] = countrow($sql);
	   return $result;
}

function ferivikasi_muat_data($id=null,$key=null) {
$where=null;
 if ($id != null) {
 $where = " where b.id = '$id'";
}
if($key != NULL){
       $cari = "where b.no_bin = '$key'";
      } else
      $cari='';
  $result = array();
   $sql="select b.id as idbin,b.no_bin as nobin,bk.nama as bank,b.nama as nama,cd.nama as tipe,jk.nama as jenis,jk.logo as jcard,bk.logo as logo,bk.id as idbank from bin b
   left join bank bk on (bk.id=b.id_bank)
   left join card_tipe cd on( cd.id=b.id_tipe)
   left join jenis_kartu jk on (jk.id=b.id_jenis)
    $where $cari order by bk.nama asc";

 if ($id != null) {
    	$result = _select_unique_result($sql);
        $result = _select_arr($sql);
    }else
      $result = _select_arr($sql);
	  
	   return $result;
}
function tipe_muat_data($id=null,$key=null) {
 $where=null;
 if ($id != null) {
 $where = " where id = '$id'";
}
if($key != NULL){
       $cari = "where nama like ('%$key%') ";
      } else
      $cari='';
  $result = array();
   $sql="select * from card_tipe $where $cari order by nama asc";

 if ($id != null) {
    	$result = _select_unique_result($sql);
        $result = _select_arr($sql);
    }else
      $result = _select_arr($sql);
	  
	   return $result;
}
function tipe_verifikasi_data($id=null,$key=null) {
 $where=null;
 if ($id != null) {
 $where = " where id = '$id'";
}
if($key != NULL){
       $cari = "where nama !='$key' ";
      } else
      $cari='';
  $result = array();
   $sql="select * from card_tipe $where $cari order by nama asc";

 if ($id != null) {
    	$result = _select_unique_result($sql);
        $result = _select_arr($sql);
    }else
      $result = _select_arr($sql);
	  
	   return $result;
}
function jenis_muat_data($id=null,$key=null) {
 $where=null;
 if ($id != null) {
 $where = " where id = '$id'";
}
if($key != NULL){
       $cari = "where nama like ('%$key%') ";
      } else
      $cari='';
  $result = array();
   $sql="select * from jenis_kartu $where $cari order by nama asc";

 if ($id != null) {
    	$result = _select_unique_result($sql);
        $result = _select_arr($sql);
    }else
      $result = _select_arr($sql);
	  
	   return $result;
}
function tagihan_muat_data($cc=null) {
 $where=null;
$result = array();
 if ($cc!= null) {
 $sql="select sisa from tagihan where no_cc='$cc' and id=(select max(id) from tagihan th where th.no_cc='$cc')";
 $result = _select_unique_result($sql);
 }
	  
	   return $result;
}
function cc_member_muat_data($id=null) {
 $where=null;
$result = array();
 if ($id!= null) {
 $sql="select * from tagihan where no_cc='$cc' and id=(select max(id) from tagihan th where th.no_cc='$cc')";
 $result = _select_unique_result($sql);
 }
	  
	   return $result;
}
function detail_cc_muat_data($id=null) {
 $where=null;
$result = array();
 if ($id!= null) {
 $sql="select * from customer_card where IdCustomer='$id' and akhir='1'";
 $result['list'] = _select_arr($sql);
   $result['total'] = countrow($sql);
 }
	  
	   return $result;
}
function jenis_ferivikasi_data($id=null,$key=null) {
 $where=null;
 if ($id != null) {
 $where = " where id = '$id'";
}
if($key != NULL){
       $cari = "where nama !='$key'";
      } else
      $cari='';
  $result = array();
   $sql="select * from jenis_kartu $where $cari order by nama asc";

 if ($id != null) {
    	$result = _select_unique_result($sql);
        $result = _select_arr($sql);
    }else
      $result = _select_arr($sql);
	  
	   return $result;
}
function detail_costumer($id=null) {
 $where=null;
 if ($id != null) {
 $where = " where c.id = '$id'";
}
  $result = array();
   $sql="select c.*,crd.*,crd.nama as ccnama,bk.nama as bank,bk.mdr as mdr,t.nama as tipe from costumer c
   left join cc crd on (crd.id_costumer=c.id)
   left join bin bn on (crd.id_bin=bn.id)
   left join bank bk on(bn.id_bank=bk.id)
    left join card_tipe t on(bn.id_tipe=t.id)
    $where order by c.nama asc";

 if ($id != null) {
    	$result = _select_unique_result($sql);
        $result = _select_arr($sql);
    }else
      $result = _select_arr($sql);
	  
	   return $result;
}
function rekening_muat_data($id=null) {
 $where=null;
 if ($id != null) {
 $where = " and r.id = '$id'";
}
  $result = array();
   $sql="select r.*,bk.nama as nama from rekening r
   left join bank bk on(r.id_bank=bk.id)
   where r.cabang='$_SESSION[cabang]' $where
 ";

 if ($id != null) {
    	$result = _select_unique_result($sql);
        $result = _select_arr($sql);
    }else
      $result = _select_arr($sql);
	  
	   return $result;
}
function member_muat_data($id = NULL, $key = NULL, $category = NULL, $sort = NULL,$sortBy=null, $page=NULL, $dataPerPage = NULL) {
if($key != NULL){
        $where = "and m.Nama like ('%$key%')";
    }else $where = "";
 if($id != NULL){
        $wherez = "and m.idmember='$id'";
    }else $wherez = "";
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
   $sql="select * from member m
  where m.akhir='1' $where $wherez $batas
 ";
 
if ($id != null) {
		$result =  _select_unique_result($sql);
                $result['list'] = _select_arr($sql);
                
	} else {
		$result['list'] = _select_arr($sql);
	}
	$sql="select * from member m
   where m.akhir='1' $where $wherez ";
	   $result['paging'] = paging($sql, $dataPerPage);
    $result['offset'] = $offset;
    $result['total'] = countrow($sql);
	   return $result;
}
//#############################//
function ferivikasi_muat_data2($id=null,$key=null,$page=NULL, $dataPerPage = NULL) {
$where=null;
 if ($id != null) {
 $where = " where b.id = '$id'";
}
if($key != NULL){
       $cari = "where b.nama = '$key'";
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
   $sql="select b.id as idbin,b.no_bin as nobin,bk.nama as bank,b.nama as nama,cd.nama as tipe,jk.nama as jenis,jk.logo as jcard,bk.logo as logo,bk.id as idbank from bin b
   left join bank bk on (bk.id=b.id_bank)
   left join card_tipe cd on( cd.id=b.id_tipe)
   left join jenis_kartu jk on (jk.id=b.id_jenis)
    $where $cari order by bk.nama asc $batas";

if ($id != null) {
		$result =  _select_unique_result($sql);
                $result['list'] = _select_arr($sql);
                
	} else {
		$result['list'] = _select_arr($sql);
	}
	$sql="select b.id as idbin,b.no_bin as nobin,bk.nama as bank,b.nama as nama,cd.nama as tipe,jk.nama as jenis,jk.logo as jcard,bk.logo as logo,bk.id as idbank from bin b
   left join bank bk on (bk.id=b.id_bank)
   left join card_tipe cd on( cd.id=b.id_tipe)
   left join jenis_kartu jk on (jk.id=b.id_jenis)
    $where $cari order by bk.nama asc";
	   $result['paging'] = paging($sql, $dataPerPage);
    $result['offset'] = $offset;
    $result['total'] = countrow($sql);
	   return $result;
}
//#############################//

function saldo_muat_data($id=null) {
if ($id != null) {
    $sql = "select saldo,norek from rekening";
        return _select_unique_result($sql . " where id_bank='$id' and cabang='$_SESSION[cabang]'");
    }
	
}
function kas_brankas_muat_data($id=null) {
if ($id != null) {
    $sql = "select b.*,r.*,r.id as idrek from bank b
	join rekening r on(r.id_bank=b.id)
	";
        return _select_unique_result($sql . " where b.id='$id' and r.cabang='$_SESSION[cabang]'");
    }
	
}
function ultah_muat_data($id=null) {
if ($id != null) {
    $sql = "select * from member";
        return _select_arr($sql . " where ttl like('%$id%')");
    }
	
}
function cek_saldo_muat_data($id=null) {
if ($id != null) {
    $sql = "select count(id) as jumlah, saldo.* from saldo where tanggal ='$id'";
   $hasil['jumlah']= _select_unique_result($sql);
   $hasil['hitung']=_select_unique_result("select sum(saldo) as total from rekening");
	 return $hasil;
    }
	
}
function cek_sisa_saldo_kas() {
$hasil=_select_unique_result("select sum(saldo) as total from rekening where id_bank='23'");
	 return $hasil;

	
}
function setting_waktu_muat_data(){
	$data = _select_unique_result("select waktu as waktu from setting");
	return $data;
}
function expire_muat_data($id=null) {
if ($id != null) {
    $sql = "select * from customer_card";
        return _select_arr($sql . " where JT like('%$id%') and akhir='1' group by No_CC");
    }
	
}

function sms_muat_data() {
    $sql = "select * from sms";
        return _select_arr($sql);
	
}
function cabang_muat_data($id=null) {
$where='';
if($id !=NULL){
$where= " where id= '$id'";
}
    $sql = "select * from cabang $where";
        return _select_arr($sql);
	
}
function edit_sms_muat_data($id) {
    $sql = "select * from sms where id='$id'";
        return _select_arr($sql);
	
}
function info_gestun_muat_data($startDate=null, $endDate=null) {
    $return = array();

    if ($startDate != null and $endDate != null) {
        $where=" where date(tc.Tgl) between '$startDate' and '$endDate' ";
    }
 
    $sql = "select tc.*,date(tc.Tgl)as tanggal,time(tc.Tgl) as jam ,SUM(tc.Jumlah_gesek) as total_gesek from transaksi_cust tc $where group by tc.IdCustomer,date(tc.Tgl) order by tc.tgl ASC";
    $return = _select_arr($sql);
  //echo "<pre>$sql</pre>";
    return $return;
}
function info_gestun_muat_data2($startDate=null, $endDate=null) {
    $return = array();

    if ($startDate != null and $endDate != null) {
        $where=" where date(tc.Tgl) between '$startDate' and '$endDate' ";
    }
 
    $sql = "select tc.*,date(tc.Tgl)as tanggal,time(tc.Tgl) as jam from transaksi_cust tc $where and tc.iduser='$_SESSION[id_user]'";
    $return = _select_arr($sql);
  //echo "<pre>$sql</pre>";
    return $return;
}

function info_gestun_muat_data3($page, $perpage,$key) {
    $return = array();
   if (!empty($page)) {
        $noPage = $page;
    } else {
        $noPage = 1;
    }
    if (isset($perpage) && $perpage != null) {
        $offset = ($noPage - 1) * $perpage;
        $batas = "limit $offset, $perpage";
    } else {
        $batas = '';
        $offset = '';
    }
 
	if($key != NULL){
       $cari = " and nama like ('%$key%') ";
	    $cari2 = " where nama like ('%$key%') ";
    
      } else
      $cari='';
	 $cari2='';
	
$sqli="select tc.*,date(tc.Tgl)as tanggal,time(tc.Tgl) as jam from transaksi_cust tc where tc.IdCustomer_card!='' $cari group by tc.IdCustomer_card $batas";


		$result['list'] = _select_arr($sqli);

	$sql="select tc.*,date(tc.Tgl)as tanggal,time(tc.Tgl) as jam from transaksi_cust tc $cari2 group by tc.IdCustomer_card";
	   $result['paging'] = paging($sql, $perpage);
    $result['offset'] = $offset;
    $result['total'] = countrow($sql);
	   return $result;	
	######################################################
}
function nota_gestun_muat_data($id=null) {
    $return = array();

    if ($id != null) {
   
 
    $sql = "select tc.*,date(tc.Tgl)as tanggal,time(tc.Tgl) as jam,tc.Jumlah_gesek as total_gesek from transaksi_cust tc where tc.id='$id'";
    $return = _select_arr($sql);
  //echo "<pre>$sql</pre>";
    return $return;
	}
}
function nota_print_gestun_muat_data($id=null) {
    $return = array();

    if ($id != null) {
   
 
    $sql = "select tc.*,date(tc.Tgl)as tanggal,time(tc.Tgl) as jam,u.nama as nama,tc.Jumlah_gesek as total_gesek from transaksi_cust tc
	join users u on (tc.iduser=u.id)
	 where tc.id='$id'";
    $return = _select_arr($sql);
  //echo "<pre>$sql</pre>";
    return $return;
	
	}
}

function info_gestun_muat_data4($startDate=null, $endDate=null,$jenis=null,$cabang=null) {
    $return = array();

    if ($startDate != null and $endDate != null) {
        $where=" where date(tc.Tgl) between '$startDate' and '$endDate' ";
    }
	if($jenis =='harian'){
	$and=" group by c.id,date(tc.Tgl)";
	$tambahan=" date(tc.Tgl) as tanggal";
	}
    else if($jenis =='mingguan'){
	$and=" group by week(tc.Tgl)";
	$tambahan=" week(tc.Tgl) as tanggal";
	}
	else{
	$and=" group by month(tc.Tgl),year(tc.Tgl)";
	$tambahan=" month(tc.Tgl) as tanggal";
	}
	if($cabang !=null){
	$cari=" and u.cabang='$cabang'";
	}
	
    $sql = "select sum(tc.Jumlah_gesek-tc.Jumlah_gesek_ADM) as jumlah,c.nama as cabang,$tambahan from transaksi_cust tc 
	join users u on (tc.iduser=u.id)
	join cabang c on (u.cabang=c.id)
	$where $cari $and";
    $return = _select_arr($sql);
	//  echo "<pre>$sql</pre>";
    return $return;
}
function info_transfer_tunda_muat_data($startDate=null, $endDate=null) {
    $return = array();

    if ($startDate != null and $endDate != null) {
        $where=" and date(tc.Tgl) between '$startDate' and '$endDate' ";
    }
 
    $sql = "select tc.*,date(tc.Tgl)as tanggal,time(tc.Tgl) as jam ,SUM(tc.Jumlah_gesek) as total_gesek from transaksi_cust tc where tc.Jenis_Transaksi='Transfer' and tc.status='Transfer Tertunda' $where group by tc.IdCustomer,date(tc.Tgl) order by tc.tgl ASC";
    $return = _select_arr($sql);
  //echo "<pre>$sql</pre>";
    return $return;
}
function info_settlement_pending_muat_data($startDate=null, $endDate=null) {
    $return = array();

    if ($startDate != null and $endDate != null) {
        $where=" and date(tc.Tgl) between '$startDate' and '$endDate' ";
    }
 
    $sql = "select tc.*,date(tc.Tgl)as tanggal,time(tc.Tgl) as jam ,tc.Jumlah_gesek as total_gesek from transaksi_cust tc where tc.Jenis_Transaksi='TUNAI' and tc.status='pending' $where order by tc.tgl ASC";
    $return = _select_arr($sql);
// echo "<pre>$sql</pre>";
    return $return;
}
function total_gestun_tunai_pending_muat_data($startDate=null, $endDate=null) {
    $return = array();

    if ($startDate != null and $endDate != null) {
        $where=" and date(tc.Tgl) between '$startDate' and '$endDate' ";
    }
 
    $sql = "select sum(tc.Jumlah_gesek) as total from transaksi_cust tc where tc.Jenis_Transaksi='TUNAI' and tc.status='pending' $where order by tc.tgl ASC";
    $return = _select_unique_result($sql);
// echo "<pre>$sql</pre>";
    return $return;
}
function info_mutasi_muat_data($startDate=null, $endDate=null) {
    $return = array();

    if ($startDate != null and $endDate != null) {
        $where=" where date(mt.Tgl) between '$startDate' and '$endDate' ";
    }
 
    $sql = "select mt.*,date(mt.Tgl)as tanggal,time(mt.Tgl) as jam,ba.nama as bankasal,bt.nama as banktujuan from transaksi_mutasi mt
	left join bank ba on (ba.id=mt.idbank_cabang1)
	left join bank bt on (bt.id=mt.idbank_cabang2)
	left join rekening ra on (ra.id=mt.idreka)
	left join rekening rt on (rt.id=mt.idrekt)
	 $where order by mt.tgl ASC";
    $return = _select_arr($sql);
  //echo "<pre>$sql</pre>";
    return $return;
}

function info_gestun_muat_grafik($startDate=null, $endDate=null) {
    $return = array();

    if ($startDate != null and $endDate != null) {
        $where=" where date(tc.Tgl) between '$startDate' and '$endDate' ";
    }
 
    $sql = "select tc.*,date(tc.Tgl)as tanggal,time(tc.Tgl) as jam ,SUM(tc.Jumlah_gesek) as total_gesek from transaksi_cust tc $where group by date(tc.Tgl) order by tc.tgl ASC";
    $return = _select_arr($sql);
  //echo "<pre>$sql</pre>";
    return $return;
}


function privilage_muat_data($idModul) {
    $privilageList = _select_arr('select * from `privileges` where id_module="' . $idModul . '" order by nama');
    return $privilageList;
}

function modul_muat_data($idParent=null) {
    if ($idParent != NULL) {
        $where = " where id_parent_modul='$idParent'";
    }else
        $where=' where id_parent_modul is NULL';
    $modulList = _select_arr("select * from module $where");
    foreach ($modulList as $key => $modul) {
        $subModul = modul_muat_data($modul['id']);
        if (count($subModul) > 0) {
            $modulList[$key]['subModul'] = $subModul;
        }
        $privilege = privilage_muat_data($modul['id']);
        if (count($privilege) > 0) {
            $modulList[$key]['privilege'] = $privilege;
        }
    }
    return $modulList;
}

function modul_muat_data2($idParent=null) {
    if ($idParent != NULL) {
        $where = " where id_parent_modul='$idParent'";
    }else
        $where=' where id_parent_modul is NULL';
    $modulList = _select_arr("select * from module $where");
    foreach ($modulList as $key => $modul) {
        $subModul = modul_muat_data2($modul['id']);
        if (count($subModul) > 0) {
            $modulList[$key]['subModul'] = $subModul;
        }
        $privilege = privilage_muat_data2($modul['id']);
        if (count($privilege) > 0) {
            $modulList[$key]['privilege'] = $privilege;
        }
    }
    return $modulList;
}

function privilage_muat_data2($idModul) {
    $sql = "select r.*,p.* from role_permission r
                                   join privileges p on (p.id=r.id_privileges)
                                   where r.id_role = '$_SESSION[id_role]' and p.id_module = '$idModul' order by p.nama";
	$privilageList = _select_arr($sql);
    return $privilageList;
}


function level_muat_data() {
    $return = array();

    $sql = mysql_query("select * from level");
    while ($data = mysql_fetch_array($sql)) {
        $return[] = $data;
    }
    return $return;
}
function brankas_muat_data() {
    $return = array();

    $sql = mysql_query("select * from rekening where id_bank='22' and cabang ='$_SESSION[cabang]'");
    while ($data = mysql_fetch_array($sql)) {
        $return[] = $data;
    }
    return $return;
}
function company_muat_data(){
    $cp=_select_unique_result("select * from company");
    if(empty($cp['nama'])){
        _insert("insert into company (nama) values ('Nama Company')");
        $cp=company_muat_data();
    }
    return $cp;
}
function pemesanan_muat_data($id=NULL) {
    $return = array();
    if ($id != NULL) {
        $where = "where p.id=$id";
    }else
        $where = "";
    $sql = mysql_query("select p.*,ir.nama as instansi,p.id_instansi_relasi_suplier,pd.nama as pegawai from pemesanan p 
                       left join instansi_relasi ir on (p.id_instansi_relasi_suplier=ir.id)
                       left join penduduk pd on (p.id_pegawai=pd.id) $where");
    while ($data = mysql_fetch_array($sql)) {
        $return[] = $data;
    }
    return $return;
}



function head_laporan_muat_data() {
    $sql = "select * from rumah_sakit";

    return _select_unique_result($sql);
}

