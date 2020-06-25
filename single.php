<?php /* Template Name: QuasarWP */ ?>

<?php

get_header();

include(get_template_directory() . '/components/header-functions.php');
?>

<body <?php body_class(); ?>>
  <div id="q-app" <?php if (isset($setting['show-loading'])) { ?>style="visibility: hidden;" <?php } ?>>
    <q-layout view="<?php echo $setting['layout']; ?>">

      <?php include(get_template_directory() . '/components/quasarwp-layout.php'); ?>

      <q-page-container>
        <q-page padding>

          <div class="q-px-xl">

            <p class="text-h3 q-pt-md"><?php the_title() ?></p>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div class="row justify-between">
                  <?php if (isset($setting['posts-show-comments-counter'])) { ?>
                    <div class="text-caption">
                      <a href="#comments">
                        <?php
                        $commentsText = __('Comments');
                        $commentsCount =  get_comments_number(get_post()->ID);
                        printf(_n('%s Comment', '%s Comments', $commentsCount), $commentsCount);
                        ?>
                      </a>
                    </div>
                  <?php } ?>
                  <?php if (isset($setting['posts-show-date'])) { ?>
                    <div class="text-caption"><?php echo get_the_date(); ?></div>
                  <?php } ?>
                </div>

                <?php if (isset($setting['posts-show-author'])) { ?>
                  <div class="text-caption">
                    <?php _e('by') ?> <?php the_author(); ?>
                  </div>
                <?php } ?>

                <q-separator class="q-my-lg"></q-separator>

                <?php if (has_post_thumbnail() && isset($setting['posts-show-featured-img'])) : ?>
                  <div align="center">
                    <q-img src="<?php the_post_thumbnail_url('largest'); ?>" alt="" style="max-width: 900px; max-height: 300px"></q-img>
                  </div>
                <?php endif ?>

                <?php include(get_template_directory() . '/components/quasarwp-social.php'); ?>

                <div class="q-pt-lg">
                  <?php the_content(); ?>
                </div>

                <?php if (isset($setting['posts-show-comments'])) { ?>
                  <div>
                    <?php
                    if (comments_open() || get_comments_number()) :
                      comments_template();
                    endif; ?>
                  </div>
                <?php } ?>

            <?php endwhile;
            endif; ?>
          </div>
        </q-page>
      </q-page-container>
    </q-layout>
  </div>

  <?php get_footer(); ?>

  <?php include(get_template_directory() . '/components/quasarwp-scripts.php'); ?>

  <script>
    new Vue({
      el: '#q-app',
      data: function() {
        return {
          isMobile: this.$q.platform.is.mobile,
          isDesktop: this.$q.platform.is.desktop,
          left: false,
          right: false,
          author: '',
          email: '',
          comment: '',
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
        },
        onSubmit(evt) {
          evt.preventDefault();

          let data = {
            post: evt.target.comment_post_ID.value,
            content: evt.target.comment.value,
          };

          <?php if (is_user_logged_in()) {
            $successMessage = __('Done');
          ?>
            data['author_name'] = '<?php echo wp_get_current_user()->display_name; ?>'
            data['author_email'] = '<?php echo wp_get_current_user()->user_email; ?>'
          <?php } else {
            $successMessage = __('Your comment is awaiting moderation.');
          ?>
            if (evt.target.author) data['author_name'] = evt.target.author.value
            if (evt.target.email) data['author_email'] = evt.target.email.value
          <?php } ?>

          data = JSON.stringify(data)
          console.log(data)

          fetch('<?php echo get_site_url(); ?>/wp-json/wp/v2/comments', {
              method: 'post',
              headers: {
                'Content-Type': 'application/json',
              },
              body: data,
            })
            .then((response) => {
              if (response.ok === true) {
                this.$q.notify({
                  color: 'green-4',
                  textColor: 'white',
                  icon: 'cloud_done',
                  message: '<?php echo $successMessage; ?>'
                })
                this.onReset()
                setTimeout(() => {
                  location.reload();
                }, 1000)
              }

              return response.json();
            })
            .then((object) => {
              if (object.data && object.data.status !== 200)
                this.$q.notify({
                  color: 'red-5',
                  textColor: 'white',
                  icon: 'warning',
                  message: object.data.params['author_email'] || object.message
                })
            })
        },
        onReset() {
          this.author = null
          this.email = null
          this.comment = null
          setTimeout(() => {
            this.$refs.commentForm.resetValidation()
          }, 100)
        }
      }
    })
  </script>
