<?php

	class charitywp_ot_font_settings {
		public  $ot_typography_id;
		public  $charitywp_css_output = array();
		public  $charitywp_font_output = array();
		public  $id_array = array();
		private $css_echo = array(
				'font-color' => 'color', 
				'font-family' => 'font-family', 
				'font-size' => 'font-size', 
				'font-style' => 'font-style',
				'font-variant'	=> 'font-variant',
				'font-weight' => 'font-weight',
				'letter-spacing' => 'letter-spacing',
				'line-height' => 'line-height',
				'text-decoration' => 'text-decoration',
				'text-transform' => 'text-transform'
				);

		/**-----------------------
		 * @param empty
		 *
		 * @return array
		 */
		public function charitywp_ot_google_api(){
			ob_start();
			require get_template_directory() .'/include/functions/webfonts.json';
			$fonts_list = ob_get_clean();

			$fonts_list = json_decode( $fonts_list, true );
			if ( ! is_array( $fonts_list ) ) {
				$fonts_list = array();
			}
			$fonts = $fonts_list;

			$font_list_arrray = array();
			foreach ( $fonts['items'] as $key => $value) {
				$font_list_arrray[$value['family']] = $value['family'];
			}
			return $font_list_arrray;
		}
		
		/**-----------------------
		 * @param $ot_typography_id
		 *
		 * @return array
		 */
		public function charitywp_ot_font_settings_echo($ot_typography_id,$selector, $default_font='Arial'){
			
			//$this->id_array[] = array('id'=>$ot_typography_id, 'default'=>$default_font );
			//Font Features Output
			$ot_typography_name = ot_get_option($ot_typography_id);

			if (!empty($ot_typography_name)) {
				$css = '';
				foreach ($ot_typography_name as $key => $value) {
					if ($this->css_echo[$key]=='font-family' && $value=='') {
						$value=$default_font;
					}
					if ($this->css_echo[$key]=='font-family') {
						$this->charitywp_font_output[]=$value;
					}
					if (!empty($ot_typography_name[$key])) {
						$css .= $this->css_echo[$key].':'.$value.';';
					}
					if (empty($ot_typography_name['font-family'])) {
						if ($this->css_echo[$key]=='font-family') {
							$css .= 'font-family:'.$default_font .';';
						}
					}
				}
				$this->charitywp_css_output[$ot_typography_id] = $selector."{".$css."}";
			}
			else{
				if( !empty( $default_font ) ) { 
					$this->charitywp_css_output[$ot_typography_id] = 'font-family:'.$default_font.';';
					$this->charitywp_css_output[$ot_typography_id] = $selector."{".'font-family:'.$default_font.';'."}";
					$this->charitywp_font_output[]=$default_font;
				}
			}
			$font_echo = $this->charitywp_font_output;
												
		}

		/**-----------------------
		 * @param empty
		 *
		 * @return css echo
		 */
		public function charitywp_css_output(){
			foreach ($this->charitywp_css_output as $value) {
				echo $value."\n";
			}
		}

		/**-----------------------
		 * @param empty
		 *
		 * @return css echo
		 */
		public function charitywp_font_output(){

			$ot_font_subset_latin = ot_get_option ('font_subsets_latin');
			$font_subsets_cyrillic = ot_get_option ('font_subsets_cyrillic');
			$font_subsets_greek = ot_get_option ('font_subsets_greek');

			if ($ot_font_subset_latin == 'on' && $font_subsets_cyrillic == 'on' && $font_subsets_greek == 'on') {
				$ot_font_subset_echo = 'cyrillic,cyrillic-ext,greek,greek-ext,latin-ext';
			}
			elseif ($ot_font_subset_latin == 'on' && $font_subsets_cyrillic == 'on') {
				$ot_font_subset_echo = 'cyrillic,cyrillic-ext,latin-ext';
			}
			elseif ($font_subsets_greek == 'on' && $font_subsets_cyrillic == 'on') {
				$ot_font_subset_echo = 'cyrillic,cyrillic-ext,greek,greek-ext';
			}
			elseif ($ot_font_subset_latin == 'on' && $font_subsets_greek == 'on') {
				$ot_font_subset_echo = 'greek,greek-ext,latin-ext';
			}
			elseif($ot_font_subset_latin == 'on'){
				$ot_font_subset_echo = 'latin-ext';
			}
			elseif($font_subsets_cyrillic == 'on'){
				$ot_font_subset_echo = 'cyrillic,cyrillic-ext';
			}
			elseif($font_subsets_greek == 'on'){
				$ot_font_subset_echo = 'greek,greek-ext';
			}
			else{
				$ot_font_subset_echo = 'cyrillic,cyrillic-ext,greek,greek-ext,latin-ext';
			}

			if (is_ssl()) {
				$ssl_control = 'https';
			}
			else{
				$ssl_control = 'http';
			}

			$fonts_url = '';
			$font_uniq = array_unique($this->charitywp_font_output);
			foreach ($font_uniq as $value) {
				$font_name = str_replace(' ', '+', $value);
				$fonts_url .= "<link href='$ssl_control://fonts.googleapis.com/css?family=".$font_name.":200,300,400,500,600,700&subset=".$ot_font_subset_echo."' rel='stylesheet' type='text/css'>\n";
			}
			echo $fonts_url;
		}
	}

	add_filter( 'ot_recognized_font_families', array('charitywp_ot_font_settings','charitywp_ot_google_api'));
	
