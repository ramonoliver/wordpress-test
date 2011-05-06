<?php

/**
* Brasilie Flash class
*
* @author Davi Alves
*/
class BrasilieFlash
{

	/**
	* Wordpress database object
	*/
	private $DB;

	
	function __construct()
	{
		$this->DB = new wpdb(get_option('oscimp_dbuser'),get_option('oscimp_dbpwd'), get_option('oscimp_dbname'), get_option('oscimp_dbhost'));
	}
}

?>