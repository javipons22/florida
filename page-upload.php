<?php
/*
Template Name: UPLOAD
 */
get_header();
?>

<div class="container my-5 py-5">
    <section class="upload my-5 d-flex justify-content-center">
        <form class="form-csv" name="CSV" id="CSV" method="POST" enctype="multipart/form-data">
            <h2>UPLOAD CSV</h2>
            <p>Todos los datos existentes seran borrados y reemplazados por los nuevos</p>
            <p><input name="CSV" type="file" name="file"></p>
            <p><input name="ruta" type="text" name="path" class="w-100 py-2" placeholder="Escribe la ruta donde se encuentran las imagenes..." required></p>
            <p><input class="boton-csv" type="submit" name="upload" value="Cargar"></p>

            <div id="estado"></div>

        </form>

    </section>
</div>

<?php 

if (isset($_POST['upload'])) {
    $csv_array = Array();
    $file = fopen($_FILES['CSV']['tmp_name'], 'r');
    if($file){
        while (($line = fgetcsv($file)) !== FALSE) {
        //$line is an array of the csv elements
        array_push($csv_array,$line);
        }
        fclose($file);
    }
    iterador_csv($csv_array);
}

function iterador_csv($csv)
{
    // Variables a usar
    $i = 0;
    $prueba = array();

    //iteramos sobre las columnas
    foreach ($csv as $a) {
        // Si es la primera fila
        if ($i == 0) {
            $campos = array();
            // iteramos en las columnas de fila 1
            for ($x = 0; $x < sizeof($a); $x++) {
                //$a(fila)[$x(columna)] asignamos variable a las keys para asignar nombres de variables dinamicos
                $str = strtolower($a[$x]);
                $nombre_campo = str_replace(' ', '', $str);
                array_push($campos, $nombre_campo);
            }
            // Hacemos que salga de este bloque if despues de ser llamado
            $i++;
            // sino iteramos en las siguientes filas
        } else {
            for ($x = 0; $x < sizeof($a); $x++) {
                // Nombre de variable dinamico
                // devuelve ej: precio1, precio2, precio3, etc...
                ${$campos[$x] . $i} = $a[$x];
            }
            //array_push($prueba, ${$campos . $i});
            $i++;
        }
    }


    if ($campos[1] == "marca") {

        $marcas_existentes = array();
        $imagenes_existentes = array();
        $args_1 = array(
            'posts_per_page'	=> -1,
            'post_type' => 'marcas'
            );
        $query_1 = new WP_Query($args_1);
        if ( $query_1->have_posts() ) : while ( $query_1->have_posts() ) : $query_1->the_post();
            array_push($marcas_existentes, get_the_title());
            array_push($imagenes_existentes, get_field('imagen_id'));
        endwhile; endif;

        borrar_posts_previos("marcas");
        borrar_imagenes_previas($imagenes_existentes);

        for ($x = 1; $x <= sizeof($csv); $x++) {

            if (!empty(${'local' . $x})) {
                // LOCAL	MARCA	TELEFONOS	CATEGORIA	HORARIOS
                $titulo = ${'marca' . $x};
                $local = ${'local' . $x};
                $telefonos = ${'telefonos' . $x};
                $categoria = ${'categoria' . $x};
                $horarios = ${'horarios' . $x};
                $imagen = ${'imagen' . $x};
                if (strlen(${'imagen' . $x}) > 0) {
                    $result = upload_image(${'imagen' . $x},'/home/javier/Imágenes/logos/');
                    $img_url = strval($result[0]);
                    $img_id = $result[1];
                } else {
                    $img_url = "";
                    $img_id = "";
                }
                crear_marca($titulo, $local, $telefonos, $categoria, $horarios, $img_url, $img_id);
            }
        }

    }

    if ($campos[1] == "comida") {

        $marcas_existentes = array();
        $imagenes_existentes = array();
        $args_1 = array(
            'posts_per_page'	=> -1,
            'post_type' => 'comidas'
            );
        $query_1 = new WP_Query($args_1);
        if ( $query_1->have_posts() ) : while ( $query_1->have_posts() ) : $query_1->the_post();
            array_push($marcas_existentes, get_the_title());
            array_push($imagenes_existentes, get_field('imagen_id'));
        endwhile; endif;

        borrar_posts_previos('comidas');
        borrar_imagenes_previas($imagenes_existentes);

        for ($x = 1; $x <= sizeof($csv); $x++) {

            if (!empty(${'local' . $x})) {
                // LOCAL	MARCA	TELEFONOS	CATEGORIA	HORARIOS
                $titulo = ${'comida' . $x};
                $local = ${'local' . $x};
                $telefonos = ${'telefonos' . $x};
                $categoria = ${'categoria' . $x};
                $horarios = ${'horarios' . $x};
                $imagen = ${'imagen' . $x};
                if (strlen(${'imagen' . $x}) > 0) {
                    $result = upload_image(${'imagen' . $x},'/home/javier/Imágenes/logos/');
                    $img_url = strval($result[0]);
                    $img_id = $result[1];
                } else {
                    $img_url = "";
                    $img_id = "";
                }
                crear_comidas($titulo, $local, $telefonos, $categoria, $horarios, $img_url, $img_id);
            }
        }

    }

    if ($campos[1] == "pelicula") {
        $marcas_existentes = array();
        $imagenes_existentes = array();
        $args_1 = array(
            'posts_per_page'	=> -1,
            'post_type' => 'peliculas'
            );
        $query_1 = new WP_Query($args_1);
        if ( $query_1->have_posts() ) : while ( $query_1->have_posts() ) : $query_1->the_post();
            array_push($marcas_existentes, get_the_title());
            array_push($imagenes_existentes, get_field('imagen_id'));
        endwhile; endif;

        borrar_posts_previos('peliculas');
        borrar_imagenes_previas($imagenes_existentes);

        for ($x = 1; $x <= sizeof($csv); $x++) {

            if (!empty(${'clasificacion' . $x})) {
                // LOCAL	MARCA	TELEFONOS	CATEGORIA	HORARIOS
                $titulo = ${'pelicula' . $x};
                $clasificacion = ${'clasificacion' . $x};
                $horarios = ${'horarios' . $x};
                $genero = ${'genero' . $x};
                $sala = ${'sala' . $x};
                $imagen = ${'imagen' . $x};
                if (strlen(${'imagen' . $x}) > 0) {
                    $result = upload_image(${'imagen' . $x},'/home/javier/Imágenes/logos/');
                    $img_url = strval($result[0]);
                    $img_id = $result[1];
                } else {
                    $img_url = "";
                    $img_id = "";
                }
                crear_peliculas($titulo, $clasificacion, $horarios, $genero, $sala,$img_url, $img_id);
            }
        }

    }

    if ($campos[1] == "agenda") {
        $marcas_existentes = array();
        $imagenes_existentes = array();
        $args_1 = array(
            'posts_per_page'	=> -1,
            'post_type' => 'agendas'
            );
        $query_1 = new WP_Query($args_1);
        if ( $query_1->have_posts() ) : while ( $query_1->have_posts() ) : $query_1->the_post();
            array_push($marcas_existentes, get_the_title());
            array_push($imagenes_existentes, get_field('imagen_id'));
        endwhile; endif;

        borrar_posts_previos('agendas');
        borrar_imagenes_previas($imagenes_existentes);

        for ($x = 1; $x <= sizeof($csv); $x++) {

            if (!empty(${'dia' . $x})) {
                // LOCAL	MARCA	TELEFONOS	CATEGORIA	HORARIOS
                $titulo = ${'agenda' . $x};
                $descripcion = ${'descripcion' . $x};
                $orden = ${'dia' . $x};
                $imagen = ${'imagen' . $x};
                if (strlen(${'imagen' . $x}) > 0) {
                    $result = upload_image(${'imagen' . $x},'/home/javier/Imágenes/logos/');
                    $img_url = strval($result[0]);
                    $img_id = $result[1];
                } else {
                    $img_url = "";
                    $img_id = "";
                }
                crear_agendas($titulo, $descripcion, $orden,$img_url, $img_id);
            }
        }

    }
}

function crear_marca($titulo, $local, $telefonos, $categoria, $horarios, $img_url, $img_id)
{
    $my_post = array(
        'post_title' => $titulo,
        'post_type' => 'marcas',
        'post_status' => 'publish',
    );

    // Insert the post into the database
    $post_id = wp_insert_post($my_post);

    update_field('category', $categoria, $post_id);
    update_field('imagena', $img_url, $post_id);
    update_field('local', $local, $post_id);
    update_field('telefono', $telefonos, $post_id);
    update_field('horarios', $horarios, $post_id);
    update_field('imagen_id', $img_id, $post_id);
   
    
}

function crear_comidas($titulo, $local, $telefonos, $categoria, $horarios, $img_url, $img_id)
{
    $my_post = array(
        'post_title' => $titulo,
        'post_type' => 'comidas',
        'post_status' => 'publish',
    );

    // Insert the post into the database
    $post_id = wp_insert_post($my_post);

    update_field('category', $categoria, $post_id);
    update_field('imagena', $img_url, $post_id);
    update_field('local', $local, $post_id);
    update_field('telefono', $telefonos, $post_id);
    update_field('horarios', $horarios, $post_id);
    update_field('imagen_id', $img_id, $post_id);
     
}
function crear_peliculas($titulo, $clasificacion, $horarios, $genero, $sala,$img_url, $img_id)
{
    $my_post = array(
        'post_title' => $titulo,
        'post_type' => 'peliculas',
        'post_status' => 'publish',
    );

    // Insert the post into the database
    $post_id = wp_insert_post($my_post);

    update_field('clasificacion', $clasificacion, $post_id);
    update_field('genero', $genero, $post_id);
    update_field('sala', $sala, $post_id);
    update_field('horarios', $horarios, $post_id);
    update_field('imagena', $img_url, $post_id);
    update_field('imagen_id', $img_id, $post_id);
     
}

function crear_agendas($titulo, $descripcion, $orden,$img_url, $img_id)
{
    $my_post = array(
        'post_title' => $titulo,
        'post_type' => 'agendas',
        'post_status' => 'publish',
    );

    // Insert the post into the database
    $post_id = wp_insert_post($my_post);

    update_field('descripcion', $descripcion, $post_id);
    update_field('dia', $orden, $post_id);
    update_field('imagena', $img_url, $post_id);
    update_field('imagen_id', $img_id, $post_id);
     
}

function borrar_posts_previos($tipo)
{
    // Argumentos para el query del loop de wordpress
    $args = array(
        'post_type' => $tipo,
        'posts_per_page' => -1,
    );

    // Query
    $query = new WP_Query($args);

    // Contador de posts borrados
    $count = 0;

    if ($query->have_posts()): while ($query->have_posts()): $query->the_post();

            $id = get_the_ID();

            wp_delete_post($id);

            $count++;

        endwhile;endif;
    wp_reset_postdata();

    return $count;

}

function borrar_imagenes_previas($array)
{
    foreach ( $array as $imagen ) {
        wp_delete_attachment( $imagen, true );
    }
}



function upload_image($name, $path) {
    $filename = $name;
    $uploaddir = wp_upload_dir();
    $uploadfile = $uploaddir['path'] . '/' . $filename;
    
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    $contents= file_get_contents($path . $filename);
    $savefile = fopen($uploadfile, 'w');
    fwrite($savefile, $contents);
    fclose($savefile);

    $wp_filetype = wp_check_filetype(basename($filename), null );

    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => $filename,
        'post_content' => '',
        'post_status' => 'inherit'
    );

    // Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    
    $attach_id = wp_insert_attachment( $attachment, $uploadfile );

    $imagenew = get_post( $attach_id );
    $fullsizepath = get_attached_file( $imagenew->ID );
    $attach_data = wp_generate_attachment_metadata( $attach_id, $fullsizepath );
    wp_update_attachment_metadata( $attach_id, $attach_data );

    $data = array();
    $data[0] = wp_get_attachment_url( $imagenew->ID );
    $data[1] = $imagenew->ID;
    return $data;
}

get_footer();
?>