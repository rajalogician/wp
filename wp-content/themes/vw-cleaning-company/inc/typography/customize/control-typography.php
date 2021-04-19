<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Cleaning_Company_Control_Typography extends WP_Customize_Control {

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
				'color'       => esc_html__( 'Font Color', 'vw-cleaning-company' ),
				'family'      => esc_html__( 'Font Family', 'vw-cleaning-company' ),
				'size'        => esc_html__( 'Font Size',   'vw-cleaning-company' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-cleaning-company' ),
				'style'       => esc_html__( 'Font Style',  'vw-cleaning-company' ),
				'line_height' => esc_html__( 'Line Height', 'vw-cleaning-company' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-cleaning-company' ),
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
		wp_enqueue_script( 'vw-cleaning-company-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-cleaning-company-ctypo-customize-controls' );
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
			'' => __( 'No Fonts', 'vw-cleaning-company' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-cleaning-company' ),
        'Acme' => __( 'Acme', 'vw-cleaning-company' ),
        'Anton' => __( 'Anton', 'vw-cleaning-company' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-cleaning-company' ),
        'Arimo' => __( 'Arimo', 'vw-cleaning-company' ),
        'Arsenal' => __( 'Arsenal', 'vw-cleaning-company' ),
        'Arvo' => __( 'Arvo', 'vw-cleaning-company' ),
        'Alegreya' => __( 'Alegreya', 'vw-cleaning-company' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-cleaning-company' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-cleaning-company' ),
        'Bangers' => __( 'Bangers', 'vw-cleaning-company' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-cleaning-company' ),
        'Bad Script' => __( 'Bad Script', 'vw-cleaning-company' ),
        'Bitter' => __( 'Bitter', 'vw-cleaning-company' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-cleaning-company' ),
        'BenchNine' => __( 'BenchNine', 'vw-cleaning-company' ),
        'Cabin' => __( 'Cabin', 'vw-cleaning-company' ),
        'Cardo' => __( 'Cardo', 'vw-cleaning-company' ),
        'Courgette' => __( 'Courgette', 'vw-cleaning-company' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-cleaning-company' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-cleaning-company' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-cleaning-company' ),
        'Cuprum' => __( 'Cuprum', 'vw-cleaning-company' ),
        'Cookie' => __( 'Cookie', 'vw-cleaning-company' ),
        'Chewy' => __( 'Chewy', 'vw-cleaning-company' ),
        'Days One' => __( 'Days One', 'vw-cleaning-company' ),
        'Dosis' => __( 'Dosis', 'vw-cleaning-company' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-cleaning-company' ),
        'Economica' => __( 'Economica', 'vw-cleaning-company' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-cleaning-company' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-cleaning-company' ),
        'Francois One' => __( 'Francois One', 'vw-cleaning-company' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-cleaning-company' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-cleaning-company' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-cleaning-company' ),
        'Handlee' => __( 'Handlee', 'vw-cleaning-company' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-cleaning-company' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-cleaning-company' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-cleaning-company' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-cleaning-company' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-cleaning-company' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-cleaning-company' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-cleaning-company' ),
        'Kanit' => __( 'Kanit', 'vw-cleaning-company' ),
        'Lobster' => __( 'Lobster', 'vw-cleaning-company' ),
        'Lato' => __( 'Lato', 'vw-cleaning-company' ),
        'Lora' => __( 'Lora', 'vw-cleaning-company' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-cleaning-company' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-cleaning-company' ),
        'Merriweather' => __( 'Merriweather', 'vw-cleaning-company' ),
        'Monda' => __( 'Monda', 'vw-cleaning-company' ),
        'Montserrat' => __( 'Montserrat', 'vw-cleaning-company' ),
        'Muli' => __( 'Muli', 'vw-cleaning-company' ),
        'Marck Script' => __( 'Marck Script', 'vw-cleaning-company' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-cleaning-company' ),
        'Open Sans' => __( 'Open Sans', 'vw-cleaning-company' ),
        'Overpass' => __( 'Overpass', 'vw-cleaning-company' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-cleaning-company' ),
        'Oxygen' => __( 'Oxygen', 'vw-cleaning-company' ),
        'Orbitron' => __( 'Orbitron', 'vw-cleaning-company' ),
        'Patua One' => __( 'Patua One', 'vw-cleaning-company' ),
        'Pacifico' => __( 'Pacifico', 'vw-cleaning-company' ),
        'Padauk' => __( 'Padauk', 'vw-cleaning-company' ),
        'Playball' => __( 'Playball', 'vw-cleaning-company' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-cleaning-company' ),
        'PT Sans' => __( 'PT Sans', 'vw-cleaning-company' ),
        'Philosopher' => __( 'Philosopher', 'vw-cleaning-company' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-cleaning-company' ),
        'Poiret One' => __( 'Poiret One', 'vw-cleaning-company' ),
        'Quicksand' => __( 'Quicksand', 'vw-cleaning-company' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-cleaning-company' ),
        'Raleway' => __( 'Raleway', 'vw-cleaning-company' ),
        'Rubik' => __( 'Rubik', 'vw-cleaning-company' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-cleaning-company' ),
        'Russo One' => __( 'Russo One', 'vw-cleaning-company' ),
        'Righteous' => __( 'Righteous', 'vw-cleaning-company' ),
        'Slabo' => __( 'Slabo', 'vw-cleaning-company' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-cleaning-company' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-cleaning-company'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-cleaning-company' ),
        'Sacramento' => __( 'Sacramento', 'vw-cleaning-company' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-cleaning-company' ),
        'Tangerine' => __( 'Tangerine', 'vw-cleaning-company' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-cleaning-company' ),
        'VT323' => __( 'VT323', 'vw-cleaning-company' ),
        'Varela Round' => __( 'Varela Round', 'vw-cleaning-company' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-cleaning-company' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-cleaning-company' ),
        'Volkhov' => __( 'Volkhov', 'vw-cleaning-company' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-cleaning-company' )
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
			'' => esc_html__( 'No Fonts weight', 'vw-cleaning-company' ),
			'100' => esc_html__( 'Thin',       'vw-cleaning-company' ),
			'300' => esc_html__( 'Light',      'vw-cleaning-company' ),
			'400' => esc_html__( 'Normal',     'vw-cleaning-company' ),
			'500' => esc_html__( 'Medium',     'vw-cleaning-company' ),
			'700' => esc_html__( 'Bold',       'vw-cleaning-company' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-cleaning-company' ),
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
			'' => esc_html__( 'No Fonts Style', 'vw-cleaning-company' ),
			'normal'  => esc_html__( 'Normal', 'vw-cleaning-company' ),
			'italic'  => esc_html__( 'Italic', 'vw-cleaning-company' ),
			'oblique' => esc_html__( 'Oblique', 'vw-cleaning-company' )
		);
	}
}
