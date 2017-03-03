<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function compress()
{
	$CI =& get_instance();
	$buffer = $CI->output->get_output();
	
	
	
	$search = array(
		'/\n/',			// replace end of line by a space
		'/\>[^\S ]+/s',		// strip whitespaces after tags, except space
		'/[^\S ]+\</s',		// strip whitespaces before tags, except space
	 	'/(\s)+/s'		// shorten multiple whitespace sequences
	  );
 
	 $replace = array(
		' ',
		'>',
	 	'<',
	 	'\\1'
	  ); 
	  
	  
	$initial=strlen($buffer);
	$buffer = preg_replace($search, $replace, $buffer);
	$CI->output->set_output($buffer);
	$CI->output->_display();
	
	
	
 
 
	/* 

	$buffer_out = preg_replace($search, $replace, $buffer);

	$final=strlen($buffer_out);
	$savings=($initial-$final)/$initial*100;
	$savings=round($savings, 2);
	$buffer_out.="\n<!-- Uncompressed size: $initial bytes; Compressed size: $final bytes; $savings% savings-->";
	
	
	$CI->output->set_output($buffer_out);
	$CI->output->_display(); 
	 */
}
/* End of file compress.php */
/* Location: ./system/application/hools/compress.php */