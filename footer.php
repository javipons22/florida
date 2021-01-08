        
        <div class="g-map-wrapper" id="gmaps-anchor">
            <iframe class="g-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.946912250245!2d-75.57921178523064!3d6.270712095461267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e468290801fc40b%3A0x278d1d049676680b!2sFlorida%20parque%20comercial!5e0!3m2!1sen!2sar!4v1605741451569!5m2!1sen!2sar" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <footer class="footer">
        <div class="container">
            <div class="logo-footer d-flex justify-content-center">
                <img class="logo-footer__imagen" src="<?php echo get_template_directory_uri(); ?>/img/logoblanco.png" alt="Logo Florida"/>
            </div>
            <div class="row footer-info--horarios d-flex justify-content-center" id="horarios-anchor"><?php
                $args_horarios = array('posts_per_page'	=> -1,'post_type' => 'horarios', 'order' => 'ASC');
                $query_horarios = new WP_Query($args_horarios);
                            
                if ( $query_horarios->have_posts() ) : while ( $query_horarios->have_posts() ) : $query_horarios->the_post();?>
                <div class="footer-info__horarios mt-4 col-lg-4">
                    <h6>Horario <?php echo get_the_title();?></h6>
                    <p>De lunes a sábado de <?php the_field('desde_am_semana');?> a.m. a <?php the_field('hasta_pm_semana');?> p.m.</p>
                    <p>Domingos y festivos de <?php the_field('desde_am_no_semana');?> a.m. a <?php the_field('hasta_pm_no_semana');?> p.m.</p>
                </div>
                <?php endwhile; endif;?>
            </div>
            <div class="footer-info d-flex justify-content-center flex-column">
                
                <div class="footer-info__contacto">
                    <p>Florida Parque Comercial 2020 | Calle 71 Nº65 - 150 | Tel: 520 28 80.</p>
                </div>
                <div class="footer-info__copyright">
                    <p>Todos los derechos reservados. Sitios web 1por1</p>
                    <a class="footer-info__habeas" target="_blank" href="https://drive.google.com/file/d/1-0KAS1zgEr6IVhUEDopWpIrtp55WAKFe/view?usp=sharing">Habeas data</a>
                </div>
            </div>
        </div>
        </footer>
    <?php wp_footer(); ?>
    
    </body>
</html>