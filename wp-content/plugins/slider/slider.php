<?php
/**Plugin name:pic fotos slider */

function slider() {
	$labels = array(
		'name'               => _x( 'Slider', 'Nombre general del CPT', 'pic' ),
		'singular_name'      => _x( 'Slider', 'Nombre singular del CPT', 'pic' ),
		'menu_name'          => _x( 'Sliders', 'menu de administracion', 'pic' ),
		'name_admin_bar'     => _x( 'Slider', 'Añadir nuevo en menu de administrador', 'pic' ),
		'add_new'            => _x( 'Crear nuevo', 'slider', 'pic' ),
		'add_new_item'       => __( 'Añadir nuevo slider', 'pic' ),
		'new_item'           => __( 'Nuevo slider', 'pic' ),
		'edit_item'          => __( 'Editar slider', 'pic' ),
		'view_item'          => __( 'ver slider', 'pic' ),
		'all_items'          => __( 'todos los slider', 'pic' ),
		'search_items'       => __( 'buscar slider', 'pic' ),
		'parent_item_colon'  => __( 'padres slider:', 'pic' ),
		'not_found'          => __( 'No slider encontrado.', 'pic' ),
		'not_found_in_trash' => __( 'No sliders found in Trash.', 'pic' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'      =>'dashicons dashicons-art',
		'supports'           => array( 'title', 'thumbnail', 'excerpt' )
	);
//Para registrar un custompost type le damos nombre y le pasamos argumentos
	register_post_type('slider', $args );
}
add_action( 'init','slider' );