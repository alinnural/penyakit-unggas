<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed'); 


	/*
	------------------------------------------------
		convert from "yyyy-mm-dd" to "dd-mm-yyyy" 
		input 	: date 		ex: "2010-05-01"
		result	: date 		ex: "01-05-2010"
	------------------------------------------------		
	*/
	function CDateDMY($var_date){
		$valdate = $var_date;
		if (strlen($var_date)> 9){
			$valdate = substr($var_date,8,2).'-'.substr($var_date,5,2).'-'.substr($var_date,0,4);
		}
		return $valdate;
	}		  
	
	/*
	------------------------------------------------
		convert from "yyyy-mm-dd" to "dd-mmm-yyyy" 
		input 	: date 		ex: "2010-05-01"
		result	: date 		ex: "01-Mei-2010"
	------------------------------------------------		
	*/
	function CDateDMMY($var_date){
		$valdate = $var_date;
		if (strlen($var_date)> 9){
			$bulan_mm = "";
			
			switch (substr($var_date,5,2)) {
				case "01":
					$bulan_mm = "Jan";
					break;
				case "02":
					$bulan_mm = "Peb";
					break;
				case "03":
					$bulan_mm = "Mar";
					break;
				case "04":
					$bulan_mm = "Apr";
					break;
				case "05":
					$bulan_mm = "Mei";
					break;
				case "06":
					$bulan_mm = "Jun";
					break;
				case "07":
					$bulan_mm = "Jul";
					break;
				case "08":
					$bulan_mm = "Agus";
					break;
				case "09":
					$bulan_mm = "Sep";
					break;
				case "10":
					$bulan_mm = "Okt";
					break;
				case "11":
					$bulan_mm = "Nov";
					break;
				case "12":
					$bulan_mm = "Des";
					break;
					
			}			
			
			$valdate = substr($var_date,8,2).'-'.$bulan_mm.'-'.substr($var_date,0,4);
		}
		return $valdate;
	}			
	
	/*
	------------------------------------------------
		convert from "dd-mm-yyyy" to "yyyy-mm-dd"
		input 	: date 		ex: "01-05-2010"
		result	: date 		ex: "2010-05-01"
	------------------------------------------------		
	*/
	function CDateYMD($var_date){
		$valdate = $var_date;
		if (strlen($var_date)==10){
			$valdate = substr($var_date,6,4).'-'.substr($var_date,3,2).'-'.substr($var_date,0,2);
		}
		return $valdate;
	}
	
	/*
	------------------------------------------------
		convert from "yyyy-mm-dd HH:mm:ss" to "yyyy-mm-dd"
		input 	: date 		ex: "2012-09-05 00:00:00"
		result	: date 		ex: "2012-09-05"
	------------------------------------------------		
	*/
	function CDTimeToDateYMD($var_date){
		$valdate = $var_date;
		if (strlen($var_date)>10){
			$valdate = substr($var_date,0,10);
		}
		return $valdate;
	}	
	
	function CRp($amount){
		//return number_format($amount, ' ', ' ', '.');
		return $amount;
	}
	
	function RpToInt($amount){
		return str_ireplace(".","",$amount);
	}
	
	function ArrToStr($val){
		return str_ireplace("Array","",$val);
	}
	
	function ToRomawi($month){
		$_varmonth="I";		
		  switch ($month) {
		  case ($month=='1'||$month=='01'):
			  $_varmonth="I";		
			  break;
		  case ($month=='2' || $month=='02'):
			  $_varmonth="II";
			  break;
		  case ($month=='3' || $month=='03'):
			  $_varmonth="III";
			  break;
		  case ($month=='4' || $month=='04'):
			  $_varmonth="IV";
			  break;
		  case ($month=='5' || $month=='04'):
			  $_varmonth="V";
			  break;
		  case ($month=='6' || $month=='06'):
			  $_varmonth="VI";
			  break;
		  case ($month=='7' || $month=='07'):
			  $_varmonth="VII";
			  break;
		  case ($month=='8' || $month=='08'):
			  $_varmonth="VIII";
			  break;
		  case ($month=='9' || $month=='09'):
			  $_varmonth="XI";
			  break;
		  case '10':
			  $_varmonth="X";
			  break;
		  case '11':
			  $_varmonth="XI";
			  break;
		  case '12':
			  $_varmonth="XII";
			  break;
		  }
		return $_varmonth;
	}
	
	

?>