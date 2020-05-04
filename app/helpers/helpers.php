<?php
	use Illuminate\Support\Facades\DB;
	
	function adodb_pr($array=array()){
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
	
	function get_client_ip() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
	

	function seo_slug($str){
	
		$seo = strtolower(str_replace(' ','-',preg_replace('/[^a-zA-Z0-9_ %\[\]\.%&-]/s', '', $str)));
		$seo=trim($seo);
		return $seo;
	}
	function date_indo($strDate,$setDay=true,$setTime=false){

		$arrDate = explode(' ',$strDate);
		$getDate = @$arrDate[0];
		$getTime = @$arrDate[1];
		$xDate	 = explode('-',$getDate);
		$xTime	 = explode(':',$getTime);
		$month = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		);
		$day  	= array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
		$getDay = $setDay==true?$day[date('w', strtotime($getDate))].', ':'';
		$date 	= '<span class="date"> '.$getDay.@$xDate[2].' '.@$month[$xDate[1]].' '.@$xDate[0].'</span>';
		$time 	= $setTime==true?'<span class="time">'.date("h:i a", strtotime($getTime)).'</span>':'';
		$date_indo = !empty($time)?$date.$time:$date;
		return $date_indo;
	}

	function month($data){
		$month = array(
			'01' => 'Ja',
			'02' => 'Feb',
			'03' => 'Mar',
			'04' => 'Apr',
			'05' => 'Mei',
			'06' => 'Jun',
			'07' => 'Jul',
			'08' => 'Agus',
			'09' => 'Sep',
			'10' => 'Okt',
			'11' => 'Nov',
			'12' => 'Des'
		);
		
		return $month[$data];
		
	}


	function anti_Injection($inp)
    { 
        if(is_array($inp)) return array_map(__METHOD__, $inp);

        if(!empty($inp) && is_string($inp)) { 
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
        } 

        return $inp; 
    }
	

?>