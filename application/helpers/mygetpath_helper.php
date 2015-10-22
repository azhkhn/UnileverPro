<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_view_path'))
{
	function get_view_path($view_name)
		{
		    $target_file=APPPATH.'views/'.$view_name.'.php';
		    if(file_exists($target_file)) return $target_file;
		}

	function get_lang_path($folder, $filename){
		$target_file=APPPATH.'language/'.$folder.'/'.$filename.'.php';
		if(file_exists($target_file)) return $target_file;
	}
}

?>