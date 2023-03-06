<?php

get_header(); 
pageBanner(array(
  'title' => 'All Campuses',
  'subtitle' => 'There is something for everyone. Have a look around.'
));
?>



<div class="container container--narrow page-section">

<ul class="link-list min-list">

<?php
  while(have_posts()) {
    the_post(); 
    $mapLocation = get_field('map_location');
    ?>
    <div class="marker" data-lat="<?php echo $mapLocation['lat'];?>" data-lng="<?php echo $mapLocation['lng'];?>"></div>
  <?php }
  echo paginate_links();
?>
</ul>



</div>

<?php get_footer();

?>