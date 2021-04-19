<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Transport_Cargo_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

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
				'color'       => esc_html__( 'Font Color', 'vw-transport-cargo' ),
				'family'      => esc_html__( 'Font Family', 'vw-transport-cargo' ),
				'size'        => esc_html__( 'Font Size',   'vw-transport-cargo' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-transport-cargo' ),
				'style'       => esc_html__( 'Font Style',  'vw-transport-cargo' ),
				'line_height' => esc_html__( 'Line Height', 'vw-transport-cargo' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-transport-cargo' ),
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
		wp_enqueue_script( 'vw-transport-cargo-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-transport-cargo-ctypo-customize-controls' );
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
			'' => __( 'No Fonts', 'vw-transport-cargo' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-transport-cargo' ),
        'Acme' => __( 'Acme', 'vw-transport-cargo' ),
        'Anton' => __( 'Anton', 'vw-transport-cargo' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-transport-cargo' ),
        'Arimo' => __( 'Arimo', 'vw-transport-cargo' ),
        'Arsenal' => __( 'Arsenal', 'vw-transport-cargo' ),
        'Arvo' => __( 'Arvo', 'vw-transport-cargo' ),
        'Alegreya' => __( 'Alegreya', 'vw-transport-cargo' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-transport-cargo' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-transport-cargo' ),
        'Bangers' => __( 'Bangers', 'vw-transport-cargo' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-transport-cargo' ),
        'Bad Script' => __( 'Bad Script', 'vw-transport-cargo' ),
        'Bitter' => __( 'Bitter', 'vw-transport-cargo' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-transport-cargo' ),
        'BenchNine' => __( 'BenchNine', 'vw-transport-cargo' ),
        'Cabin' => __( 'Cabin', 'vw-transport-cargo' ),
        'Cardo' => __( 'Cardo', 'vw-transport-cargo' ),
        'Courgette' => __( 'Courgette', 'vw-transport-cargo' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-transport-cargo' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-transport-cargo' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-transport-cargo' ),
        'Cuprum' => __( 'Cuprum', 'vw-transport-cargo' ),
        'Cookie' => __( 'Cookie', 'vw-transport-cargo' ),
        'Chewy' => __( 'Chewy', 'vw-transport-cargo' ),
        'Days One' => __( 'Days One', 'vw-transport-cargo' ),
        'Dosis' => __( 'Dosis', 'vw-transport-cargo' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-transport-cargo' ),
        'Economica' => __( 'Economica', 'vw-transport-cargo' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-transport-cargo' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-transport-cargo' ),
        'Francois One' => __( 'Francois One', 'vw-transport-cargo' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-transport-cargo' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-transport-cargo' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-transport-cargo' ),
        'Handlee' => __( 'Handlee', 'vw-transport-cargo' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-transport-cargo' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-transport-cargo' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-transport-cargo' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-transport-cargo' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-transport-cargo' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-transport-cargo' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-transport-cargo' ),
        'Kanit' => __( 'Kanit', 'vw-transport-cargo' ),
        'Lobster' => __( 'Lobster', 'vw-transport-cargo' ),
        'Lato' => __( 'Lato', 'vw-transport-cargo' ),
        'Lora' => __( 'Lora', 'vw-transport-cargo' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-transport-cargo' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-transport-cargo' ),
        'Merriweather' => __( 'Merriweather', 'vw-transport-cargo' ),
        'Monda' => __( 'Monda', 'vw-transport-cargo' ),
        'Montserrat' => __( 'Montserrat', 'vw-transport-cargo' ),
        'Muli' => __( 'Muli', 'vw-transport-cargo' ),
        'Marck Script' => __( 'Marck Script', 'vw-transport-cargo' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-transport-cargo' ),
        'Open Sans' => __( 'Open Sans', 'vw-transport-cargo' ),
        'Overpass' => __( 'Overpass', 'vw-transport-cargo' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-transport-cargo' ),
        'Oxygen' => __( 'Oxygen', 'vw-transport-cargo' ),
        'Orbitron' => __( 'Orbitron', 'vw-transport-cargo' ),
        'Patua One' => __( 'Patua One', 'vw-transport-cargo' ),
        'Pacifico' => __( 'Pacifico', 'vw-transport-cargo' ),
        'Padauk' => __( 'Padauk', 'vw-transport-cargo' ),
        'Playball' => __( 'Playball', 'vw-transport-cargo' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-transport-cargo' ),
        'PT Sans' => __( 'PT Sans', 'vw-transport-cargo' ),
        'Philosopher' => __( 'Philosopher', 'vw-transport-cargo' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-transport-cargo' ),
        'Poiret One' => __( 'Poiret One', 'vw-transport-cargo' ),
        'Quicksand' => __( 'Quicksand', 'vw-transport-cargo' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-transport-cargo' ),
        'Raleway' => __( 'Raleway', 'vw-transport-cargo' ),
        'Rubik' => __( 'Rubik', 'vw-transport-cargo' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-transport-cargo' ),
        'Russo One' => __( 'Russo One', 'vw-transport-cargo' ),
        'Righteous' => __( 'Righteous', 'vw-transport-cargo' ),
        'Slabo' => __( 'Slabo', 'vw-transport-cargo' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-transport-cargo' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-transport-cargo'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-transport-cargo' ),
        'Sacramento' => __( 'Sacramento', 'vw-transport-cargo' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-transport-cargo' ),
        'Tangerine' => __( 'Tangerine', 'vw-transport-cargo' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-transport-cargo' ),
        'VT323' => __( 'VT323', 'vw-transport-cargo' ),
        'Varela Round' => __( 'Varela Round', 'vw-transport-cargo' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-transport-cargo' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-transport-cargo' ),
        'Volkhov' => __( 'Volkhov', 'vw-transport-cargo' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-transport-cargo' )
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
			'' => esc_html__( 'No Fonts weight', 'vw-transport-cargo' ),
			'100' => esc_html__( 'Thin',       'vw-transport-cargo' ),
			'300' => esc_html__( 'Light',      'vw-transport-cargo' ),
			'400' => esc_html__( 'Normal',     'vw-transport-cargo' ),
			'500' => esc_html__( 'Medium',     'vw-transport-cargo' ),
			'700' => esc_html__( 'Bold',       'vw-transport-cargo' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-transport-cargo' ),
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
			'normal'  => esc_html__( 'Normal', 'vw-transport-cargo' ),
			'italic'  => esc_html__( 'Italic', 'vw-transport-cargo' ),
			'oblique' => esc_html__( 'Oblique', 'vw-transport-cargo' )
		);
	}
}
