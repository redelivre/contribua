<?php

class Contribua
{	
	const TEXTO_DESCRITIVO_PADRAO = 'Selecione ou insira um valor para sua contribuição. Ao clicar no botão, você será direcionado à área de pagamento.';

	/**
	 * [getOption description]
	 * @param  [type] $index [description]
	 * @return [type]        [description]
	 */
	public static function getOption($index) 
	{
		$options = get_option('contribua_options', array());

		return (array_key_exists($index, $options)?  $options[$index] : NULL);
	}

	/**
	 * [save_Contribua_settings description]
	 * @return [type] [description]
	 */
	public static function saveSettings() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$_POST['contribuicaofixa1'] = isset($_POST['contribuicaofixa1']) ? $_POST['contribuicaofixa1'] : '';
			$_POST['contribuicaofixa2'] = isset($_POST['contribuicaofixa2']) ? $_POST['contribuicaofixa2'] : '';
			$_POST['contribuicaofixa3'] = isset($_POST['contribuicaofixa3']) ? $_POST['contribuicaofixa3'] : '';
			$_POST['contribuicaolivre'] = isset($_POST['contribuicaolivre']) ? $_POST['contribuicaolivre'] : '';

			$_POST['tipo_contribuicaofixa1'] = isset($_POST['tipo_contribuicaofixa1']) ? $_POST['tipo_contribuicaofixa1'] : '';
			$_POST['tipo_contribuicaofixa2'] = isset($_POST['tipo_contribuicaofixa2']) ? $_POST['tipo_contribuicaofixa2'] : '';
			$_POST['tipo_contribuicaofixa3'] = isset($_POST['tipo_contribuicaofixa3']) ? $_POST['tipo_contribuicaofixa3'] : '';

			$descricao                   = strip_tags(trim($_POST['descricao']));
			$carteira                    = strip_tags(trim($_POST['carteira']));
			$url_retorno                 = strip_tags(trim($_POST['url_retorno']));
			$color_institucional         = strip_tags(trim($_POST['color_institucional']));
			$color_projeto               = strip_tags(trim($_POST['color_projeto']));
			$color_outros                = strip_tags(trim($_POST['color_outros']));
			$contribuicaofixa1           = strip_tags(trim($_POST['contribuicaofixa1']));
			$tipo_contribuicaofixa1      = strip_tags(trim($_POST['tipo_contribuicaofixa1']));
			$descricao_contribuicaofixa1 = strip_tags(trim($_POST['descricao_contribuicaofixa1']));
			$valor_contribuicaofixa1     = strip_tags(trim($_POST['valor_contribuicaofixa1']));
			$contribuicaofixa2           = strip_tags(trim($_POST['contribuicaofixa2']));
			$tipo_contribuicaofixa2      = strip_tags(trim($_POST['tipo_contribuicaofixa2']));
			$descricao_contribuicaofixa2 = strip_tags(trim($_POST['descricao_contribuicaofixa2']));
			$valor_contribuicaofixa2     = strip_tags(trim($_POST['valor_contribuicaofixa2']));
			$contribuicaofixa3           = strip_tags(trim($_POST['contribuicaofixa3']));
			$tipo_contribuicaofixa3      = strip_tags(trim($_POST['tipo_contribuicaofixa3']));
			$descricao_contribuicaofixa3 = strip_tags(trim($_POST['descricao_contribuicaofixa3']));
			$valor_contribuicaofixa3     = strip_tags(trim($_POST['valor_contribuicaofixa3']));
			$contribuicaolivre           = strip_tags(trim($_POST['contribuicaolivre']));
			$descricao_contribuicaolivre = strip_tags(trim($_POST['descricao_contribuicaolivre']));

			update_option('contribua_options', array(
				'descricao'                   => $descricao,
				'carteira'                    => $carteira,
				'url_retorno'                 => $url_retorno,
				'color_institucional'         => $color_institucional,
				'color_projeto'               => $color_projeto,
				'color_outros'                => $color_outros,
				'contribuicaofixa1'           => $contribuicaofixa1,
				'tipo_contribuicaofixa1'      => $tipo_contribuicaofixa1,
				'descricao_contribuicaofixa1' => $descricao_contribuicaofixa1,
				'valor_contribuicaofixa1'     => $valor_contribuicaofixa1,
				'contribuicaofixa2'           => $contribuicaofixa2,
				'tipo_contribuicaofixa2'      => $tipo_contribuicaofixa2,
				'descricao_contribuicaofixa2' => $descricao_contribuicaofixa2,
				'valor_contribuicaofixa2'     => $valor_contribuicaofixa2,
				'contribuicaofixa3'           => $contribuicaofixa3,
				'tipo_contribuicaofixa3'      => $tipo_contribuicaofixa3,
				'descricao_contribuicaofixa3' => $descricao_contribuicaofixa3,
				'valor_contribuicaofixa3'     => $valor_contribuicaofixa3,
				'contribuicaolivre'           => $contribuicaolivre,
				'descricao_contribuicaolivre' => $descricao_contribuicaolivre
			));
		}
	}

	/**
	 * [template description]
	 * @param  [type] $url [description]
	 * @return [type]      [description]
	 */
	public function template($url)
	{
		return CONTRIBUA_PATH.'/tpl_contribua.php';
	}

	public static function getColorByType($type) {
		switch ($type) {
			case '1':
				return Contribua::getOption('color_institucional');
			case '2':
				return Contribua::getOption('color_projeto');
			default:
				return Contribua::getOption('color_outros');
		}
	}

	public static function getTypeName($type) {
		switch ($type) {
			case '1':
				return __('Institucional', 'contribua');
			case '2':
				return __('Projeto', 'contribua');
			default:
				return __('Outro', 'contribua');
		}
	}

	public static function getContentPath()
	{
		return CONTRIBUA_PATH . '/views/content.php';
	}

	public static function addStylesheet()
	{
		wp_enqueue_style('contribua-css-app',
				plugins_url('/contribua/assets/css/app.css', CONTRIBUA_PATH));
	}

	public static function addJavascript()
	{
		wp_enqueue_script('contribua-price',
				plugins_url('/contribua/assets/js/price.js', CONTRIBUA_PATH));
		wp_enqueue_script('contribua-app',
				plugins_url('/contribua/assets/js/app.js', CONTRIBUA_PATH));
		wp_enqueue_script('contribua-moip',
				plugins_url('/contribua/assets/js/moip.js', CONTRIBUA_PATH));
	}

	public static function addAdminStylesheet()
	{
		wp_enqueue_style('contribua-css-app',
				plugins_url('/contribua/assets/css/app.css', CONTRIBUA_PATH));
		wp_enqueue_style('wp-color-picker');
	}

	public static function addAdminJavascript()
	{
		wp_enqueue_script('contribua-admin',
				plugins_url('/contribua/assets/js/admin.js', CONTRIBUA_PATH),
				array('wp-color-picker'));
		wp_enqueue_script('contribua-price',
				plugins_url('/contribua/assets/js/price.js', CONTRIBUA_PATH));
		wp_enqueue_script('contribua-app',
				plugins_url('/contribua/assets/js/app.js', CONTRIBUA_PATH));
	}
}

