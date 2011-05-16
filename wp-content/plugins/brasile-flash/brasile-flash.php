<?php
/**
 * @package Brasile Flash
 */
/*
Plugin Name: Brasile Flash
Plugin URI: http://brasileturismoviagens.com/
Description: Plugin desenvolvido especificamente para alterar o conteúdo dos flashs na página inicial do site
Version: 1.0
Author: Davi Alves 
Author URI: http://agenciaclaro.com.br/
*/

/**
*
* Inclue a p�gina de configuração
*
*/

class BrasileFlash
{
	/**
	* 
	* Executa a action de adicionar o menu na instancia da classe
	* 
	*/
	public function __construct()
	{		
		// Ação que adiciona o menu
		add_action('admin_menu', array($this ,'brasile_admin_menu') );
	}

	public function brasile_admin_page()
	{
		include_once('brasile-flash-admin.php');
	}

	/**
	*
	* Adiciona o menu e registra as configurações
	*
	*/
	public function brasile_admin_menu()
	{
		add_options_page("Brasile Flash", "Brasile Flash", 'manage_options', "brasile-flash-menu", array($this, "brasile_admin_page") );
		add_action( 'admin_init',  array($this, 'register_brasile_flash_config' ) );
	}

	public function register_brasile_flash_config(){
		register_setting( 'brasile_flash_config', 'brasile_flash1_name' );
		register_setting( 'brasile_flash_config', 'brasile_flash1_title' );
		register_setting( 'brasile_flash_config', 'brasile_flash1_text' );

		register_setting( 'brasile_flash_config', 'brasile_flash2_name' );
		register_setting( 'brasile_flash_config', 'brasile_flash2_title' );
		register_setting( 'brasile_flash_config', 'brasile_flash2_text' );
		
	}

	/**
	* 
	* Reescreve o arquivo .xml referente ao flash
	* 
	* @param array $arr
	* @param array $old_files	
	*/
	private function salvar_xml($arr, $old_files = array())
	{
		//TODO usar WP_CONTENT_DIR para salvar o xml na mesma pasta do flash
		foreach($old_files as $old_file){
			if(empty($old_file)) continue;
			$old_file = dirname(__FILE__).'/'.$old_file.'.xml';
			if(file_exists($old_file))
				unlink($old_file);
		}

		$flashs = $this->preparar_dados($arr);
		foreach ($flashs as $flash) {
			$xml = new SimpleXMLElement("<?xml version='1.0' encoding='ISO-8859-1'?><brasileflash />");
			$xml->addChild('titulo', $flash['titulo']);
			$xml->addChild('texto', $flash['texto']);

			file_put_contents( dirname(__FILE__).'/'.$flash['nome'].'.xml',$xml->asXML());
		}
	}

	/**
	* 
	* Organiza o array para salvar o xml
	* 
	* @param array $arr
	* @return array
	*/
	private function preparar_dados($arr)
	{
		$flash1           = array();
		$flash1['nome']   = $arr['brasile_flash1_name'];
		$flash1['titulo'] = $arr['brasile_flash1_title'];
		$flash1['texto']  = $arr['brasile_flash1_text'];
		$flash2           = array();
		$flash2['nome']   = $arr['brasile_flash2_name'];
		$flash2['titulo'] = $arr['brasile_flash2_title'];
		$flash2['texto']  = $arr['brasile_flash2_text'];

		return array($flash1, $flash2);
	}

	/**
	* Verifica se nenhum valor passado é nulo
	* 
	* @param array $arr
	* @return boolean
	*/
	private function validar($arr)
	{
		$valido = true;
		foreach ($arr as $row) {
			if(empty($row))
				$valido = false;
		}

		return $valido;
	}

	/**
	* Cleaning Input Script
	* Copyright 2009 - www.pgmr.co.uk - contact@pgmr.co.uk
	*
	* @param string $str
	* @return string
	*/
	private function cleanXSS($str) {
		$str = trim($str);
		if(!get_magic_quotes_gpc()) {
	    	$str = addslashes($str);
	    }
		$str = strip_tags(htmlspecialchars($str));
		return $str;
	}

}

// Inicia o plugin
$brasile_flash = new BrasileFlash();

?>