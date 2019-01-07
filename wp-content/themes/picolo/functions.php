<?php
/**********************************************************
LOGO
********************************************************/
add_theme_support('custom-logo');


/**********************************************************
MENUS
********************************************************/
//damos permiso a la plantilla para poder usar en ella los menus de wp
add_theme_support('nav_menus');
//habilitar zonas en las que poder asignar esos menus -> posteriormente deberemos añadir esas zonas en los ficheros que quiero que se muestren (header.php, footer.php...)
if(function_exists('register_nav_menus')){
    register_nav_menus(array(
        "zona_header"=>"Zona Header",
        "zona_footer"=>"Zona Footer")
    );
}


/**********************************************************
WIDGETS
**********************************************************/
//creamos zonas en las que posteriormente podremos añadir widgets-> estas zonas deberan ser llamadas en los documentos que queremos que se muestren
register_sidebar(array(
    'name' => 'Zona footer left',
    'id' => 'column-footer-1',
    'description' => 'Columna izquierda del footer',
    'class' => 'footer-col',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h5>',
    'after_title' => '</h5>'
));
register_sidebar(array(
    'name' => 'Zona footer right',
    'id' => 'column-footer-2',
    'description' => 'Columna derecha del footer',
    'class' => 'footer-col',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h5>',
    'after_title' => '</h5>'
));
register_sidebar(array(
    'name' => 'Zona sidebar Blog',
    'id' => 'column-sidebar-blog',
    'description' => 'Columna sidebar blog',
    'class' => 'footer-col',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h5>',
    'after_title' => '</h5>'
));
register_sidebar(array(
    'name' => 'Zona sidebar',
    'id' => 'column-sidebar',
    'description' => 'Columna sidebar',
    'class' => 'footer-col',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h5>',
    'after_title' => '</h5>'
));
register_sidebar(array(
    'name' => 'Zona sidebar Trabajos',
    'id' => 'column-sidebar-trabajos',
    'description' => 'Columna sidebar',
    'class' => 'footer-col',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h5>',
    'after_title' => '</h5>'
));


//Ejecutar PHP en widgets de texto
function ejecutar_php($html){
    if(strpos($html,"<"."?php")!==false){
        ob_start();
        eval("?".">".$html);
        $html=ob_get_contents();
        ob_end_clean();
    }
    return $html;
}
add_filter('widget_text','ejecutar_php',100);


/**********************************************************
ENTRADAS Y PAG
********************************************************/
add_theme_support('post-thumbnails');
// Añade tamaños personalizados a WordPress
add_image_size ( 'hero', 1440, 625, array('center','center') );


add_post_type_support('page', 'excerpt');




/***********************************************************
SHORTCODE
************************************************************/
//Shortcode simple
function shortcode_gracias() {
	return '<p>¡Gracias por leer mi blog!, si te gustó suscríbete al feed RSS</p>';
}
add_shortcode('gracias', 'shortcode_gracias');
//[gracias]


//Shortcode con atributos
function shortcode_atributos($attr){
    extract($attr); 
    $detalles = '<div class="row">';
    if(isset($cliente)){
        $detalles .= '<div class="span3"><h6 class="title-bg"><i class="icon-users"></i>Cliente: <small>'.$cliente.'</small></h6></div>';
    }
    if(isset($link)){
        $detalles .= '<div class="span2"><h6 class="title-bg"><i class="icon-share-alts"></i>Ver: <small><a href="'.$link.'" target="_blank">Ver proyecto</a></small></h6></div>';
    }
    if(isset($fecha)){
        $detalles .= '<div class="span2"><h6 class="title-bg"><i class="icon-calendar"></i>Fecha: <small>'.$fecha.'</small></h6></div>';
    }
    $detalles .= '</div>';
   
    return $detalles;
}
add_shortcode('datos', 'shortcode_atributos');
//[detalles cliente="rap" link="Nach" fecha='']
/*En las páginas de la plantilla que queramos que contengan el código, bastará llamar a la función WP do_shortcode en el lugar deseado
do_shortcode( '[detalles]' );
*/


//mostrar esta info en escritorio
/////////////////////////////////////
add_action('wp_dashboard_setup', 'widget_info_panel');
 
function widget_info_panel() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_help_widget', 'Mas info', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo '<h2>Más info</h2><ul><li>Para añadir shortcode de trabajos: [datos cliente="rap" link="Nach" fecha=""] </li></ul>';
}




/************************************************************
PERSONALIZACIÓN DEL LOGIN
************************************************************/

// Creamos una función que inyectará un fragmento de estilo en línea (<style></style>) en la cabecera de la pantalla del login.
function personalizacion_login() {
    echo
    '<style type="text/css">
        body.login { background:gray; }
        .login h1 { margin:40px 0 40px;background: url('.get_bloginfo('template_directory').'/img/LOGO_PERSONAL.png) no-repeat center; background-size: contain; height:150px;}
        .login h1 a { display:none; }
    </style>';
}
// Añadimos la acción que llama a dicha función al cargar el head del login
add_action('login_head', 'personalizacion_login');





/************************************************************
//BREADCRUMBS
************************************************************/
 
function dimox_breadcrumbs() {
	/* === OPTIONS === */
	$text['home']     = 'Home'; // text for the 'Home' link
	$text['category'] = 'Archive by Category "%s"'; // text for a category page
	$text['search']   = 'Resultados de búsqueda para "%s" '; // text for a search results page
	$text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
	$text['author']   = 'Articles Posted by %s'; // text for an author page
	$text['404']      = 'Error 404'; // text for the 404 page
	$text['page']     = 'Page %s'; // text 'Page N'
	$text['cpage']    = 'Comment Page %s'; // text 'Comment Page N'
	$wrap_before    = '<div class="breadcrumbs">'; // the opening wrapper tag
	$wrap_after     = '</div><!-- .breadcrumbs -->'; // the closing wrapper tag
	$sep            = '›'; // separator between crumbs
	$sep_before     = '<span class="sep">'; // tag before separator
	$sep_after      = '</span>'; // tag after separator
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_current   = 1; // 1 - show current page title, 0 - don't show
	$before         = '<span class="current">'; // tag before the current crumb
	$after          = '</span>'; // tag after the current crumb
	/* === END OF OPTIONS === */
	global $post;
	$home_link      = home_url('/');
	$link_before    = '<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
	$link_after     = '</span>';
	$link_attr      = ' itemprop="url"';
	$link_in_before = '<span itemprop="title">';
	$link_in_after  = '</span>';
	$link           = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
	$frontpage_id   = get_option('page_on_front');
	$parent_id      = $post->post_parent;
	$sep            = ' ' . $sep_before . $sep . $sep_after . ' ';
	if (is_home() || is_front_page()) {
		if ($show_on_home) echo $wrap_before . '<a href="' . $home_link . '">' . $text['home'] . '</a>' . $wrap_after;
	} else {
		echo $wrap_before;
		if ($show_home_link) echo sprintf($link, $home_link, $text['home']);
		if ( is_category() ) {
			$cat = get_category(get_query_var('cat'), false);
			if ($cat->parent != 0) {
				$cats = get_category_parents($cat->parent, TRUE, $sep);
				$cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				if ($show_home_link) echo $sep;
				echo $cats;
			}
			if ( get_query_var('paged') ) {
				$cat = $cat->cat_ID;
				echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
			}
		} elseif ( is_search() ) {
			if (have_posts()) {
				if ($show_home_link && $show_current) echo $sep;
				if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
			} else {
				if ($show_home_link) echo $sep;
				echo $before . sprintf($text['search'], get_search_query()) . $after;
			}
		} elseif ( is_day() ) {
			if ($show_home_link) echo $sep;
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
			echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
			if ($show_current) echo $sep . $before . get_the_time('d') . $after;
		} elseif ( is_month() ) {
			if ($show_home_link) echo $sep;
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
			if ($show_current) echo $sep . $before . get_the_time('F') . $after;
		} elseif ( is_year() ) {
			if ($show_home_link && $show_current) echo $sep;
			if ($show_current) echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) {
			if ($show_home_link) echo $sep;
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current) echo $sep . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $sep);
				if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				echo $cats;
				if ( get_query_var('cpage') ) {
					echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
				} else {
					if ($show_current) echo $before . get_the_title() . $after;
				}
			}
		// custom post type
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			if ( get_query_var('paged') ) {
				echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo $sep . $before . $post_type->label . $after;
			}
		} elseif ( is_attachment() ) {
			if ($show_home_link) echo $sep;
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			if ($cat) {
				$cats = get_category_parents($cat, TRUE, $sep);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				echo $cats;
			}
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current) echo $sep . $before . get_the_title() . $after;
		} elseif ( is_page() && !$parent_id ) {
			if ($show_current) echo $sep . $before . get_the_title() . $after;
		} elseif ( is_page() && $parent_id ) {
			if ($show_home_link) echo $sep;
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $sep;
				}
			}
			if ($show_current) echo $sep . $before . get_the_title() . $after;
		} elseif ( is_tag() ) {
			if ( get_query_var('paged') ) {
				$tag_id = get_queried_object_id();
				$tag = get_tag($tag_id);
				echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
			}
		} elseif ( is_author() ) {
			global $author;
			$author = get_userdata($author);
			if ( get_query_var('paged') ) {
				if ($show_home_link) echo $sep;
				echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_home_link && $show_current) echo $sep;
				if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
			}
		} elseif ( is_404() ) {
			if ($show_home_link && $show_current) echo $sep;
			if ($show_current) echo $before . $text['404'] . $after;
		} elseif ( has_post_format() && !is_singular() ) {
			if ($show_home_link) echo $sep;
			echo get_post_format_string( get_post_format() );
		}
		echo $wrap_after;
	}
}



/************************************************************
PAGINACIÓN
************************************************************/
function wp_corenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;
 
  $total = 1; //1 - muestra el texto "Página N de N", 0 - para no mostrar nada
  $a['mid_size'] = 5; //cuantos enlaces a mostrar a izquierda y derecha del actual
  $a['end_size'] = 1; //cuantos enlaces mostrar al comienzo y al fin
  $a['prev_text'] = '&laquo; Anterior'; //texto para el enlace "Página siguiente"
  $a['next_text'] = 'Siguiente &raquo;'; //texto para el enlace "Página anterior"
 
  if ($max > 1) echo '<div class="pagination">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Página ' . $current . ' de ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
}

