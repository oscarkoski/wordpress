<?php
//Template Name: Page contact

$mng="";
$cssError="";
if (isset( $_POST['form_contact'] )) {
                //Creamos una variable para almacenar los errores
                global $reg_errors;
                $reg_errors = new WP_Error;

                //Recogemos en variables los datos enviados en el formulario y los sanitizamos.
                //Si detectamos algún error, podremos más abajo rellenar los campos del formulario con los datos enviados para no tener que empezar el formulario de cero
                $f_name = sanitize_text_field($_POST['nombre']);
                $f_email = sanitize_email($_POST['email']);
                $f_message = sanitize_text_field($_POST['mensaje']);

                //El campo Nombre es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
                if ( empty( $f_name ) ) {
                  $reg_errors->add("empty-name", "El campo nombre es obligatorio");
                }
                //El campo Email es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
                if ( empty( $f_email ) ) {
                  $reg_errors->add("empty-email", "El campo e-mail es obligatorio");
                }
                //Comprobamos que el dato tenga formato de e-mail con la función de WordPress "is_email" y en caso contrario creamos un registro de error
                if ( !is_email( $f_email ) ) {
                  $reg_errors->add( "invalid-email", "El e-mail no tiene un formato válido" );
                }
                //El campo Mensaje es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
                if ( empty( $f_message ) ) {
                  $reg_errors->add("empty-message", "El campo consulta es obligatorio");
                }

                //Si no hay errores enviamos el formulario
                if (count($reg_errors->get_error_messages()) == 0) {
                  //Destinatario
                    //no usar bloginfo ya que hace echo
                  $recipient = get_option('admin_email');

                  //Asunto del email
                  $subject = 'Formulario de contacto ' . get_option( 'blogname' );

                  //La dirección de envio del email es la de nuestro blog por lo que agregando este header podremos responder al remitente original
                  $headers = "Reply-to: " . $f_name . " <" . $f_email . ">\r\n";

                  //Montamos el cuerpo de nuestro e-mail
                  $message = "Nombre: " . $f_name . "<br>";
                  $message .= "E-mail: " . $f_email . "<br>";
                  $message .= "Mensaje: " . nl2br($f_message) . "<br>";
                                   
                  //Filtro para indicar que email debe ser enviado en modo HTML
                  add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
                                    
                  //Por último enviamos el email
                  $envio = wp_mail( $recipient, $subject, $message, $headers);

                  //Si el e-mail se envía correctamente mostramos un mensaje y vaciamos las variables con los datos. En caso contrario mostramos un mensaje de error
                  if ($envio) {
                    unset($f_name);
                    unset($f_email);
                    unset($f_message);
                    $mng="El formulario ha sido enviado correctamente."; 
                    $cssError="alert alert-success";

                  }else {
                      $mng="Se ha producido un error enviando el formulario. Puede intentarlo más tarde o ponerse en contacto con nosotros escribiendo un mail a ".get_option('admin_email');
                      $cssError="alert alert-danger";

                  }
                }else{
                    $mng=$reg_errors->get_error_message();
                    $cssError="alert alert-danger";
                }
                
                
              }
?>
<?php get_header() ?>
     
    <!-- Page Content
    ================================================== --> 
    <div class="row"><!--Container row-->

        <div class="span8 contact"><!--Begin page content column-->

            <h3 class="title-bg"><?php the_title();?></h3>
            <?php the_content();?>

            <div class="<?=$cssError?>">
                <?= $mng ?> 
            </div>

            <form action="<?= get_permalink() ?>" method="post" id="contact-form">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input name="nombre" required class="span4" id="prependedInput" size="16" type="text" placeholder="Name">
                </div>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-envelope"></i></span>
                    <input name="email" required class="span4" id="prependedInput" size="16" type="email" placeholder="Email Address">
                </div>
                <textarea required name="mensaje" class="span6"></textarea>
                
                <!--reCaptcha -> https://desarrollowp.com/blog/tutoriales/como-agregar-recaptcha-a-un-formulario-de-contacto-personalizado-en-wordpress-sin-plugins/-->
                
                <div class="row">
                    <div class="span2">
                        <input name="form_contact" type="submit" class="btn btn-inverse" value="Send Message">
                    </div>
                </div>
            </form>

        </div> <!--End page content column-->

        <!-- Sidebar
        ================================================== --> 
        <?php get_sidebar() ?>

    </div><!-- End container row -->
    
        
<?php get_footer() ?>  