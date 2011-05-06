<?php
/**
 * @package Brasilie Flash
 */
/*
Plugin Name: Brasilie Flash
Plugin URI: http://brasileturismoviagens.com/
Description: Plugin desenvolvido especificamente para alterar o conteúdo dos flashs na página inicial do site
Version: 1.0
Author: Davi Alves
Author URI: http://agenciaclaro.com.br/
*/

/**
*
* Inclue a página de configuração
*
*/
function brasilie_admin()
{
	include_once('brasilie-flash-admin.php');
}

/**
*
* Método que adiciona o menu e registra as configurações as configurações
*
*/
function brasilie_admin_menu()
{
	add_options_page("Brasilie Flash", "Brasilie Flash", 'manage_options', "brasilie-flash-menu", "brasilie_admin");
	add_action( 'admin_init', 'register_brasilie_flash_config' );
}

function register_brasilie_flash_config(){
	register_setting( 'brasilie_flash_config', 'brasilie_flash1_name' );
	register_setting( 'brasilie_flash_config', 'brasilie_flash1_title' );
	register_setting( 'brasilie_flash_config', 'brasilie_flash1_text' );

	register_setting( 'brasilie_flash_config', 'brasilie_flash2_name' );
	register_setting( 'brasilie_flash_config', 'brasilie_flash2_title' );
	register_setting( 'brasilie_flash_config', 'brasilie_flash2_text' );
	
}

/**
 * Reescreve o arquivo .xml referente ao flash
 * 
 * @param array $arr
 * @param array $old_files	
 */
function salvar_xml($arr, $old_files = array())
{
	foreach($old_files as $old_file){
		if(empty($old_file)) continue;
		$old_file = dirname(__FILE__).'/'.$old_file.'.xml';
		if(file_exists($old_file))
			unlink($old_file);
	}

	$flashs = preparar_dados($arr);
	foreach ($flashs as $flash) {
		$xml = new SimpleXMLElement("<?xml version='1.0' encoding='ISO-8859-1'?><brasilieflash />");
		$xml->addChild('titulo', $flash['titulo']);
		$xml->addChild('texto', $flash['texto']);

		file_put_contents( dirname(__FILE__).'/'.$flash['nome'].'.xml',$xml->asXML());
	}
}

/**
 * Organiza o array para salvar o xml
 * 
 * @param array $arr
 * @return array
 */
function preparar_dados($arr)
{
	$flash1           = array();
	$flash1['nome']   = $arr['brasilie_flash1_name'];
	$flash1['titulo'] = $arr['brasilie_flash1_title'];
	$flash1['texto']  = $arr['brasilie_flash1_text'];
	$flash2           = array();
	$flash2['nome']   = $arr['brasilie_flash2_name'];
	$flash2['titulo'] = $arr['brasilie_flash2_title'];
	$flash2['texto']  = $arr['brasilie_flash2_text'];

	return array($flash1, $flash2);
}

/**
 * Verifica se nenhum valor passado é nulo
 * 
 * @param array $arr
 * @return boolean
 */
function validar($arr)
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
 */
function cleanXSS($str) {
	$str = trim($str);
	if(!get_magic_quotes_gpc()) {
    	$str = addslashes($str);
    }
	$str = strip_tags(htmlspecialchars($str));
	return $str;
}

// Acão que adiciona o menu
add_action('admin_menu', 'brasilie_admin_menu');

?>