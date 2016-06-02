<?php 


$query = array(
  'posts_per_page'  => -1,
  'post_parent'     => 6,
  'post_type'       => 'page',
  'orderby'         => 'rand',
  #'paged'						=> $paged,
  #'orderby'         => 'meta_value_num',
  #'meta_key'        => 'year',
);

$temp = $wp_query; 
$wp_query = null; 
$wp_query = new WP_Query(); 
$wp_query->query($query);

?>

<div class="covered project-list__images">

<?php while ($wp_query->have_posts()) : $wp_query->the_post();  ?>
<?php if ( has_post_thumbnail() ): ?>

<div data-title="<?php the_title(); ?>" class="project-list__image covered" style="z-index: 8; display: none;">
  <div class="centered">
    <div class="fs-row">
      <div class="fs-cell fs-lg-5 fs-md-4 fs-sm-3 fs-centered">
        <?php the_post_thumbnail('large', array('class' => 'img-centered')); ?>
      </div>
    </div>
  </div>
</div>

<?php endif; ?>
<?php 
	endwhile; 
	$wp_query = null; 
	$wp_query = $temp;
?>

</div>