<!-- 3x3 grid layout -->
<div class="stacked-container">
  <?php
  if (have_posts()) : while (have_posts()) : the_post();
  ?>
      <?php include('components/post-layout/stacked.php'); ?>
  <?php
    endwhile;
  endif;
  ?>
</div>
