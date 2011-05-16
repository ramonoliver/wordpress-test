<?php
if($_POST){
	if( isset($_POST['action']) && $_POST['action'] == 'update' 
		&& isset($_POST['option_page']) && $_POST['option_page'] == 'brasile_flash_config' ){
		$config = array();
		$config['brasile_flash1_name']  = $this->cleanXSS($_POST['brasile_flash1_name']);
		$config['brasile_flash1_title'] = $this->cleanXSS($_POST['brasile_flash1_title']);
		$config['brasile_flash1_text']  = $this->cleanXSS($_POST['brasile_flash1_text']);
		$config['brasile_flash2_name']  = $this->cleanXSS($_POST['brasile_flash2_name']);
		$config['brasile_flash2_title'] = $this->cleanXSS($_POST['brasile_flash2_title']);
		$config['brasile_flash2_text']  = $this->cleanXSS($_POST['brasile_flash2_text']); 

		if($this->validar($config)){
			$old_file1 = get_option('brasile_flash1_name');
			$old_file2 = get_option('brasile_flash2_name');
			foreach ($config as $key => $value) {
				update_option($key, $value);
			}
			$this->salvar_xml($config, array($old_file1, $old_file2));
			?>
			<div id="setting-error-settings_updated" class="updated settings-error"> 
				<p><strong><?php _e('Configurações salvas.') ?></strong></p>
			</div>
			<?php
		}else{
			?>
			<div id="setting-error-settings_updated" class="error settings-error"> 
				<p><strong><?php _e('Favor preencher todos os campos.') ?></strong></p>
			</div>
			<?php
		}
	}
}
?>
<div class="wrap">
	<h2>Blasile Flash</h2>
	<p>
		Página referente a configuração dos flashs na página inicial
	</p>

	<form method="POST" action="<?php echo $_SERVER["REQUEST_URI"];#"options.php" ?>">
		<?php settings_fields( 'brasile_flash_config' ); ?>
		<h3>Flash 1</h3>
		<table class="form-table" style="width:500px;">
			<tbody>
				<tr>
					<th><label for="brasile_flash1_name">Nome do arquivo<span> *</span>: </label></th>
			        <td><input id="brasile_flash1_name" name="brasile_flash1_name" value="<?php echo get_option('brasile_flash1_name'); ?>" class="regular-text code" /></td>
		        </tr>
		        <tr>
		        	<th><label for="brasile_flash1_title">Titulo do flash<span> *</span>: </label></th>
		        	<td><input id="brasile_flash1_title" name="brasile_flash1_title" value="<?php echo get_option('brasile_flash1_title'); ?>" class="regular-text code" /></td>
		        </tr>
		        <tr>
		        	<th><label for="brasile_flash1_text">Texto do flash<span> *</span>: </label></th>
		        	<td><input id="brasile_flash1_text" name="brasile_flash1_text" value="<?php echo get_option('brasile_flash1_text'); ?>" class="regular-text code" /></td>
		        </tr>
	        </tbody>
	    </table>
	    <h3>Flash 2</h3>
	    <table class="form-table" style="width:500px;">
			<tbody>
				<tr>
					<th><label for="brasile_flash2_name">Nome do arquivo<span> *</span>: </label></th>
			        <td><input id="brasile_flash2_name" name="brasile_flash2_name" value="<?php echo get_option('brasile_flash2_name'); ?>" class="regular-text" /></td>
		        </tr>
		        <tr>
		        	<th><label for="brasile_flash2_title">Titulo do flash<span> *</span>: </label></th>
		        	<td><input id="brasile_flash2_title" name="brasile_flash2_title" value="<?php echo get_option('brasile_flash2_title'); ?>" class="regular-text" /></td>
		        </tr>
		        <tr>
		        	<th><label for="brasile_flash2_text">Texto do flash<span> *</span>: </label></th>
		        	<td><input id="brasile_flash2_text" name="brasile_flash2_text" value="<?php echo get_option('brasile_flash2_text'); ?>" class="regular-text" /></td>
		        </tr>
	        </tbody>
	    </table>
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>