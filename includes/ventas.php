<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array( 'post_type' => 'post',
               'posts_per_page' => 9,
               'category_name' => 'venta',
               'paged' => $paged 
             );
$wp_query = new WP_Query($args); ?>

<div class="container postVentas">
  <h2 style="text-align: center;">Propiedades en Venta</h2>

  <div class="row">
  <? while ( have_posts() ) : the_post(); ?>
      <div class="col-md-4">
        <? $urlImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
        <div class="card mb-4 box-shadow">
          <div style="background-image: url(<?= $urlImage?>);" class="imagePost"></div>
            <div class="card-body">
              <p class="card-text"><? the_title(); ?></p>
              <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="<?= the_permalink() ?>" class="btn btn-primary">Ver Propiedad</a>
                  </div>
                  <small class="text-muted"><?= get_the_date() ?></small>
                </div>
            </div>
        </div>
      </div>
  <?php endwhile; ?>
  </div>
  
  <div class="mb-4">
    <?php next_posts_link( '&larr; Propiedades Anteriores', $wp_query ->max_num_pages); ?>
    <?php previous_posts_link( 'Propiedades recientes &rarr;' ); ?>
  </div>
</div>