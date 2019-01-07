<?php

/**Plugin name:trabajo */

function trabajos() {
	$labels = array(
		'name'               => _x( 'trabajos', 'Nombre general del CPT', 'pic' ),
		'singular_name'      => _x( 'trabajos', 'Nombre singular del CPT', 'pic' ),
		'menu_name'          => _x( 'trabajos', 'menu de administracion', 'pic' ),
		'name_admin_bar'     => _x( 'trabajos', 'Añadir nuevo trabajos en menu de administrador', 'pic' ),
		'add_new'            => _x( 'Crear nuevo', 'trabajos', 'pic' ),
		'add_new_item'       => __( 'Añadir nuevo trabajos', 'pic' ),
		'new_item'           => __( 'Nuevo trabajos', 'pic' ),
		'edit_item'          => __( 'Editar trabajos', 'pic' ),
		'view_item'          => __( 'ver trabajos', 'pic' ),
		'all_items'          => __( 'todos los trabajos', 'pic' ),
		'search_items'       => __( 'buscar trabajos', 'pic' ),
		'parent_item_colon'  => __( 'padres trabajos:', 'pic' ),
		'not_found'          => __( 'No trabajos encontrado.', 'pic' ),
		'not_found_in_trash' => __( 'No trabajos found in Trash.', 'pic' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Plugin para añadir trabajos', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'trabajos' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title','editor', 'thumbnail', 'excerpt' )
	);
//Para registrar un custompost type le damos nombre y le pasamos argumentos
	register_post_type('trabajos', $args );
}
add_action( 'init','trabajos' );

//Meta boxes
//hook -> add_meta_box, indicando la funcion que añadirá la caja donde dibujaremos los atributos
//Orden de valores de funcion add_meta_box:
//1ºNombre de la Meta Box
//2ºTítulo de la seccion
//3ºfunción que dibujará los campos
//4ºCustom Post Type al que se va a asignar
//5ºLugar donde aparecerá: Normal, Advanced, Side
//6ºPrioridad respecto a otras Meta Boxes

function trabajos_metabox(){
    add_meta_box('trabajos meta', "Más sobre este trabajo", 'mostrar_trabajos','trabajos','normal','high');
}
add_action("add_meta_boxes", "trabajos_metabox");

//Por lo tanto, solo queda dibujar ese campo
function mostrar_trabajos($trabajos){
    $cliente= esc_html(get_post_meta($trabajos->ID, 'trabajo_cliente', true));
    $url= esc_html(get_post_meta($trabajos->ID, 'trabajo_url', true));
    $year= esc_html(get_post_meta($trabajos->ID, 'trabajo_year', true));
    
    ?>
<table>
    <tr>
        <td>Cliente:</td>
        <td><input type="text" name="trabajo_cliente" value="<?php echo $cliente?>"></td>
        <td>URL:</td>
        <td><input type="text" name="trabajo_url" value="<?php echo $url?>"></td>
        <td>Año:</td>
        <td><input type="text" name="trabajo_year" value="<?php echo $year?>"></td>
        
    </tr>
</table>
    
<?php } ?>
<?php

//GUARDAR METABOXES
//
//Una vez que tenemos los campos disponibles, falta guardalos en la tabla pic_post (como ppsot)
add_action('save_post','trabajos_save_metas', 10, 2);
function trabajos_save_metas($id_trabajo, $trabajos){
//    Comprobamos que es del tipo que nos interesa
    if($trabajos->post_type=='trabajos'){
//        Guardamos los datos que vienen de post
        if(isset($_POST['trabajo_cliente'])){
            update_post_meta($id_trabajo, 'trabajo_cliente', $_POST['trabajo_cliente']);
            
        }
        if(isset($_POST['trabajo_year'])){
            update_post_meta($id_trabajo, 'trabajo_year', $_POST['trabajo_year']);
            
        }
        if(isset($_POST['trabajo_url'])){
            update_post_meta($id_trabajo, 'trabajo_url', $_POST['trabajo_url']);
            
        }
       
    }
}
//CREAR TAXONOMIAS DEL CPT TRABAJOS
add_action( 'init', 'trabajos_taxonomy' );
function trabajos_taxonomy() {
	$labels = array(
	'name' => _x( 'Genre', 'post type general name','pic' ),
        'singular_name' => _x( 'Genre', 'post type singular name','pic' ),
        'add_new' => _x( 'Añadir nuevo', 'genre' ),
        'add_new_item' => __( 'Añadir nuevo Genre' ),
        'edit_item' => __( 'Editar Genre' ),
        'new_item' => __( 'Nuevo Genre' ),
        'view_item' => __( 'Ver Genre' ),
        'search_items' => __( 'Buscar Genres' ),
        'not_found' =>  __( 'No se han encontrado Genres' ),
        'not_found_in_trash' => __( 'No se han encontrado Genres en la papelera' ),
        'parent_item_colon' => ''
    );
 
    // Creamos un array para $args
    $args = array( 'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite'=> array( 'slug' => 'genre' ),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
 
    register_post_type( 'genre', $args ); /* Registramos y a funcionar */
}
