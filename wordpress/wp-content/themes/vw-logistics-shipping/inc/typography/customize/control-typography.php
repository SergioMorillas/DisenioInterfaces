<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Logistics_Shipping_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'vw-logistics-shipping-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-logistics-shipping' ),
				'family'      => esc_html__( 'Font Family', 'vw-logistics-shipping' ),
				'size'        => esc_html__( 'Font Size',   'vw-logistics-shipping' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-logistics-shipping' ),
				'style'       => esc_html__( 'Font Style',  'vw-logistics-shipping' ),
				'line_height' => esc_html__( 'Line Height', 'vw-logistics-shipping' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-logistics-shipping' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-logistics-shipping-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-logistics-shipping-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-logistics-shipping' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-logistics-shipping' ),
        'Acme' => __( 'Acme', 'vw-logistics-shipping' ),
        'Anton' => __( 'Anton', 'vw-logistics-shipping' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-logistics-shipping' ),
        'Arimo' => __( 'Arimo', 'vw-logistics-shipping' ),
        'Arsenal' => __( 'Arsenal', 'vw-logistics-shipping' ),
        'Arvo' => __( 'Arvo', 'vw-logistics-shipping' ),
        'Alegreya' => __( 'Alegreya', 'vw-logistics-shipping' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-logistics-shipping' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-logistics-shipping' ),
        'Bangers' => __( 'Bangers', 'vw-logistics-shipping' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-logistics-shipping' ),
        'Bad Script' => __( 'Bad Script', 'vw-logistics-shipping' ),
        'Bitter' => __( 'Bitter', 'vw-logistics-shipping' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-logistics-shipping' ),
        'BenchNine' => __( 'BenchNine', 'vw-logistics-shipping' ),
        'Cabin' => __( 'Cabin', 'vw-logistics-shipping' ),
        'Cardo' => __( 'Cardo', 'vw-logistics-shipping' ),
        'Courgette' => __( 'Courgette', 'vw-logistics-shipping' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-logistics-shipping' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-logistics-shipping' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-logistics-shipping' ),
        'Cuprum' => __( 'Cuprum', 'vw-logistics-shipping' ),
        'Cookie' => __( 'Cookie', 'vw-logistics-shipping' ),
        'Chewy' => __( 'Chewy', 'vw-logistics-shipping' ),
        'Days One' => __( 'Days One', 'vw-logistics-shipping' ),
        'Dosis' => __( 'Dosis', 'vw-logistics-shipping' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-logistics-shipping' ),
        'Economica' => __( 'Economica', 'vw-logistics-shipping' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-logistics-shipping' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-logistics-shipping' ),
        'Francois One' => __( 'Francois One', 'vw-logistics-shipping' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-logistics-shipping' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-logistics-shipping' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-logistics-shipping' ),
        'Handlee' => __( 'Handlee', 'vw-logistics-shipping' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-logistics-shipping' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-logistics-shipping' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-logistics-shipping' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-logistics-shipping' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-logistics-shipping' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-logistics-shipping' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-logistics-shipping' ),
        'Kanit' => __( 'Kanit', 'vw-logistics-shipping' ),
        'Lobster' => __( 'Lobster', 'vw-logistics-shipping' ),
        'Lato' => __( 'Lato', 'vw-logistics-shipping' ),
        'Lora' => __( 'Lora', 'vw-logistics-shipping' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-logistics-shipping' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-logistics-shipping' ),
        'Merriweather' => __( 'Merriweather', 'vw-logistics-shipping' ),
        'Monda' => __( 'Monda', 'vw-logistics-shipping' ),
        'Montserrat' => __( 'Montserrat', 'vw-logistics-shipping' ),
        'Muli' => __( 'Muli', 'vw-logistics-shipping' ),
        'Marck Script' => __( 'Marck Script', 'vw-logistics-shipping' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-logistics-shipping' ),
        'Open Sans' => __( 'Open Sans', 'vw-logistics-shipping' ),
        'Overpass' => __( 'Overpass', 'vw-logistics-shipping' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-logistics-shipping' ),
        'Oxygen' => __( 'Oxygen', 'vw-logistics-shipping' ),
        'Orbitron' => __( 'Orbitron', 'vw-logistics-shipping' ),
        'Patua One' => __( 'Patua One', 'vw-logistics-shipping' ),
        'Pacifico' => __( 'Pacifico', 'vw-logistics-shipping' ),
        'Padauk' => __( 'Padauk', 'vw-logistics-shipping' ),
        'Playball' => __( 'Playball', 'vw-logistics-shipping' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-logistics-shipping' ),
        'PT Sans' => __( 'PT Sans', 'vw-logistics-shipping' ),
        'Philosopher' => __( 'Philosopher', 'vw-logistics-shipping' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-logistics-shipping' ),
        'Poiret One' => __( 'Poiret One', 'vw-logistics-shipping' ),
        'Quicksand' => __( 'Quicksand', 'vw-logistics-shipping' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-logistics-shipping' ),
        'Raleway' => __( 'Raleway', 'vw-logistics-shipping' ),
        'Rubik' => __( 'Rubik', 'vw-logistics-shipping' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-logistics-shipping' ),
        'Russo One' => __( 'Russo One', 'vw-logistics-shipping' ),
        'Righteous' => __( 'Righteous', 'vw-logistics-shipping' ),
        'Slabo' => __( 'Slabo', 'vw-logistics-shipping' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-logistics-shipping' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-logistics-shipping'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-logistics-shipping' ),
        'Sacramento' => __( 'Sacramento', 'vw-logistics-shipping' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-logistics-shipping' ),
        'Tangerine' => __( 'Tangerine', 'vw-logistics-shipping' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-logistics-shipping' ),
        'VT323' => __( 'VT323', 'vw-logistics-shipping' ),
        'Varela Round' => __( 'Varela Round', 'vw-logistics-shipping' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-logistics-shipping' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-logistics-shipping' ),
        'Volkhov' => __( 'Volkhov', 'vw-logistics-shipping' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-logistics-shipping' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-logistics-shipping' ),
			'100' => esc_html__( 'Thin',       'vw-logistics-shipping' ),
			'300' => esc_html__( 'Light',      'vw-logistics-shipping' ),
			'400' => esc_html__( 'Normal',     'vw-logistics-shipping' ),
			'500' => esc_html__( 'Medium',     'vw-logistics-shipping' ),
			'700' => esc_html__( 'Bold',       'vw-logistics-shipping' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-logistics-shipping' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'vw-logistics-shipping' ),
			'normal'  => esc_html__( 'Normal', 'vw-logistics-shipping' ),
			'italic'  => esc_html__( 'Italic', 'vw-logistics-shipping' ),
			'oblique' => esc_html__( 'Oblique', 'vw-logistics-shipping' )
		);
	}
}
