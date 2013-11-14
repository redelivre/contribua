<?php

class Contribua
{	
	const TEXTO_DESCRITIVO_PADRAO = 'Selecine ou insira um valor para sua contribuição. Ao clicar no botão, você será direcionado à área de pagamento.';

	/**
	 * [getOption description]
	 * @param  [type] $index [description]
	 * @return [type]        [description]
	 */
	public static function getOption($index) 
	{
		$options = get_option('contribua_options');
		return array_key_exists($index, $options) ? $options[$index] : NULL;
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
		return CONTRIBUA_PATH.'/tpl_Contribua.php';
	}
	
	/**
	 * [createPageTemplate description]
	 * @return [type] [description]
	 */
	public static function createPageTemplate()
	{
		$screens = array( 'page' );
		foreach ($screens as $screen)
		{
			global $_wp_post_type_features;
			add_meta_box(
					'contribua-meta',
					__( 'Template Contribua', 'contribua' ),
					function()
					{
						// Use nonce for verification
						wp_nonce_field(plugin_basename( __FILE__ ), 'contribua_noncename');
						?>
	    					<input type="checkbox" name="contribua-template-checkbox" id="contribua-template-checkbox" class="contribua-template-checkbox" <?php echo get_page_template_slug() == 'contribua' ? 'checked="checked"': ''; ?> value="S" />
	    					<label for="contribua-template-checkbox">Transforme essa página em Contribua</label>
	    				<?php 
	    			},
	    			$screen,
	    			'side'
	    	);
	    }
	}
	    
    public static function savePage($post_id)
    {
    	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_ID'])) {
            $post_ID = (int) $_POST['post_ID'];

            if(array_key_exists('contribua-template-checkbox', $_POST) && $_POST['contribua-template-checkbox'] == 'S')
            {
                update_post_meta( $post_ID, '_wp_page_template', 'contribua' );
            }
            else
            {
                update_post_meta( $post_ID, '_wp_page_template', 'default' );
            }
        }
    }
    
    /**
     * [mobilize_single_template description]
     * @param  [type] $single_template [description]
     * @return [type]                  [description]
     */
    function single_template($single_template)
    {
    	if ('contribua' == get_page_template_slug()) {
    		global $post, $user_ID;
    
    		$post_slug = $post->post_name;
    
    		/*add_action('wp_print_scripts', function() {
    			wp_enqueue_script('mobilize', plugins_url('/mobilize/assets/js/mobilize.js', INC_MOBILIZE));
    		});*/
    
    		$templateTheme = get_stylesheet_directory().'/contribua.php';
    		return file_exists($templateTheme) ? $templateTheme : CONTRIBUA_PATH.'/tpl_contribua.php';
    	}
    
    	return $single_template;
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
				return 'Institucional';
			case '2':
				return 'Projeto';
			default:
				return 'Outro';
		}
	}
}

add_action('add_meta_boxes', array('Contribua', 'createPageTemplate'));
add_action('save_post', array('Contribua', 'savePage'));
add_filter('page_template', array('Contribua', 'single_template'));
