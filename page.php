<?php /* Template Name: QuasarWP */ ?>

<?php

get_header();

include(get_template_directory() . '/components/header-functions.php');
?>


<body <?php body_class(); ?>>
  <div id="q-app" <?php if (isset($setting['show-loading'])) { ?>style="visibility: hidden;" <?php } ?>>
    <q-layout view="<?php echo $setting['layout']; ?>">

      <?php include(get_template_directory() . '/components/quasarwp-layout.php'); ?>

      <?php include(get_template_directory() . '/components/quasarwp-scripts.php'); ?>

      <q-page-container>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile;
        endif; ?>
      </q-page-container>
    </q-layout>
  </div>

  <?php get_footer(); ?>

  <script>
    let vueObject = {
      el: '#q-app',
      data: function() {
        return {
          isMobile: this.$q.platform.is.mobile,
          isDesktop: this.$q.platform.is.desktop,
          left: false,
          right: false
        }
      },
      <?php if (isset($setting['show-loading'])) { ?>
        created() {
          this.$q.loading.show()
        },
        mounted() {
          this.$nextTick(function() {
            setTimeout(() => {
              this.$q.loading.hide()
              document.getElementById('q-app').style.visibility = 'visible'
            }, 500)
          })
        },
      <?php } ?>
      methods: {
        themeRouteTo(permalink) {
          document.location.href = permalink
        }
      }
    }
    if (typeof vm !== 'undefined') vueObject.mixins = [vm]
    new Vue(vueObject)
  </script>
