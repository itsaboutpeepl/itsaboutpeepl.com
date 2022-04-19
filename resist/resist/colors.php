<?php

$theme_colors = array(
    'black' => '#000000',
    'white' => '#FFFFFF',
    'red' => '#FF344D',
    'cream' => '#FFFDF6',
    'clay' => '#EDEADE'
);

function resist_default_background_setup(){
    global $theme_colors;

    // This should be set to whatever the CSS defines
    // the default body background color to be.
    $default_background_color = $theme_colors['cream'];

    add_theme_support(
        'custom-background',
        array(
            'default-color' => trim( $default_background_color, '#' ),
        )
    );
}

// Since `add_theme_support` merges the `custom-background` settings it’s given,
// and according to the source code for the function, "The first value registered wins",
// our custom backgorund color has to be defined *before* the parent theme sets
// its own default background colour. So we use priority=9, to sneak in before the
// parent theme’s call to add_action() with the default priority (10).
add_action( 'after_setup_theme', 'resist_default_background_setup', 9 );


function resist_editor_color_palette_setup(){
    global $theme_colors;

    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name'  => esc_html__( 'Black', 'resist' ),
                'slug'  => 'black',
                'color' => $theme_colors['black'],
            ),
            array(
                'name'  => esc_html__( 'White', 'resist' ),
                'slug'  => 'white',
                'color' => $theme_colors['white'],
            ),
            array(
                'name'  => esc_html__( 'Red', 'resist' ),
                'slug'  => 'red',
                'color' => $theme_colors['red'],
            ),
            array(
                'name'  => esc_html__( 'Cream', 'resist' ),
                'slug'  => 'cream',
                'color' => $theme_colors['cream'],
            ),
            array(
                'name'  => esc_html__( 'Clay', 'resist' ),
                'slug'  => 'clay',
                'color' => $theme_colors['clay'],
            )
        )
    );
}

add_action( 'after_setup_theme', 'resist_editor_color_palette_setup', 11 );
