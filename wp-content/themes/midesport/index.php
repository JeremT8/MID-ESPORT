<?php get_header() ?>


<?php if (have_posts()) : the_post(); ?>
    <div>
        <?php while (have_posts()) : the_post() ?>
            <?php the_post_thumbnail('post-thumbnail') ?>
            <h5> <?php the_title() ?> </h5>
            <h6> <?php the_category() ?> </h6>
            <p> <?php the_excerpt() ?> </p>
            <a href="<?php the_permalink() ?>"> Voir plus </a>

        <?php endwhile ?>
    </div>

    <nav aria-label="Page navigation example">
  <ul class="pagination">
  <?= paginate_links(['type' => 'list']); ?>
  </ul>
</nav>

   <?= paginate_links(); ?>
    
<?php else : ?>
    <h1> Pas d'article </h1>
<?php endif; ?>


<?php get_footer() ?>