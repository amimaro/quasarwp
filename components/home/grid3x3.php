<!-- 3x3 grid layout -->
<div class="grid-3x3-container">
  <?php
  if (have_posts()) : while (have_posts()) : the_post();
  ?>
      <?php include('components/post-layout/grid3x3.php'); ?>
  <?php
    endwhile;
  endif;
  ?>
</div>
