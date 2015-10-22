<?php

class Settings{

	private $CI;
	
	function __construct(){
		$this->CI = & get_instance();
		$this->CI->load->helper('file');
	}

	function getLogo(){
		$string = read_file(APPPATH.'settings/logo.php');
		return $string;
	}

	function setLogo($string){
		if ( ! write_file(APPPATH.'settings/logo.php', trim($string))){
		    log_message('debug','Unable to write the file');
		    return false;
		}else{
		    log_message('debug','File written!');
		    return true;
		}
	}
}
?>