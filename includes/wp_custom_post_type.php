<?php

function opslens_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Clientes', 'Post Type General Name', 'opslens' ),
		'singular_name'         => _x( 'Cliente', 'Post Type Singular Name', 'opslens' ),
		'menu_name'             => __( 'Clientes', 'opslens' ),
		'name_admin_bar'        => __( 'Clientes', 'opslens' ),
		'archives'              => __( 'Archivo de Clientes', 'opslens' ),
		'attributes'            => __( 'Atributos de Cliente', 'opslens' ),
		'parent_item_colon'     => __( 'Cliente Padre:', 'opslens' ),
		'all_items'             => __( 'Todos los Clientes', 'opslens' ),
		'add_new_item'          => __( 'Agregar Nuevo Cliente', 'opslens' ),
		'add_new'               => __( 'Agregar Nuevo', 'opslens' ),
		'new_item'              => __( 'Nuevo Cliente', 'opslens' ),
		'edit_item'             => __( 'Editar Cliente', 'opslens' ),
		'update_item'           => __( 'Actualizar Cliente', 'opslens' ),
		'view_item'             => __( 'Ver Cliente', 'opslens' ),
		'view_items'            => __( 'Ver Clientes', 'opslens' ),
		'search_items'          => __( 'Buscar Cliente', 'opslens' ),
		'not_found'             => __( 'No hay resultados', 'opslens' ),
		'not_found_in_trash'    => __( 'No hay resultados en Papelera', 'opslens' ),
		'featured_image'        => __( 'Imagen del Cliente', 'opslens' ),
		'set_featured_image'    => __( 'Colocar Imagen del Cliente', 'opslens' ),
		'remove_featured_image' => __( 'Remover Imagen del Cliente', 'opslens' ),
		'use_featured_image'    => __( 'Usar como Imagen del Cliente', 'opslens' ),
		'insert_into_item'      => __( 'Insertar en Cliente', 'opslens' ),
		'uploaded_to_this_item' => __( 'Cargado a este Cliente', 'opslens' ),
		'items_list'            => __( 'Listado de Clientes', 'opslens' ),
		'items_list_navigation' => __( 'Navegación del Listado de Cliente', 'opslens' ),
		'filter_items_list'     => __( 'Filtro del Listado de Clientes', 'opslens' ),
	);
	$args = array(
		'label'                 => __( 'Cliente', 'opslens' ),
		'description'           => __( 'Portafolio de Clientes', 'opslens' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'tipos-de-clientes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 15,
		'menu_icon'             => 'dashicons-businessperson',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'clientes', $args );

}

add_action( 'init', 'opslens_custom_post_type', 0 );