<script>
  window.quasarConfig = {
    brand: {
      primary: '<?php echo $setting['theme-primary'] ?>',
      secondary: '<?php echo $setting['theme-secondary'] ?>',
      accent: '<?php echo $setting['theme-accent'] ?>',
      dark: '<?php echo $setting['theme-dark'] ?>',
      positive: '<?php echo $setting['theme-positive'] ?>',
      negative: '<?php echo $setting['theme-negative'] ?>',
      info: '<?php echo $setting['theme-info'] ?>',
      warning: '<?php echo $setting['theme-warning'] ?>'
    }
  }
</script>

<?php
echo '<script src="https://cdn.jsdelivr.net/npm/quasar@1.12.4/dist/quasar.ie.polyfills.umd' . $minified . '.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/vue@^2.0.0/dist/vue' . $minified . '.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/quasar@1.12.4/dist/quasar.umd' . $modernEs6 . $minified . '.js"></script>';
if ($language != 'en-us')
  echo '<script src="https://cdn.jsdelivr.net/npm/quasar@1.12.5/dist/lang/' . $language . '.umd' . $minified . '.js"></script>';
if ($iconSet != 'material')
  echo '<script src="https://cdn.jsdelivr.net/npm/quasar@1.12.5/dist/icon-set/' . $iconSet . '.umd' . $minified . '.js"></script>';
?>

<script>
  let vueObject = {
    el: '#q-app',
    data: function() {
      return {
        isMobile: this.$q.platform.is.mobile,
        isDesktop: this.$q.platform.is.desktop,
        qwpLeft: false,
        qwpRight: false,
        qwpAuthor: '',
        qwpEmail: '',
        qwpComment: '',
        qwpSearch: ''
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
      quasarwpRouteTo(permalink) {
        document.location.href = permalink
      },
      quasarwpOnReset() {
        this.qwpAuthor = null
        this.qwpEmail = null
        this.qwpComment = null
        setTimeout(() => {
          this.$refs.qwpCommentForm.resetValidation()
        }, 100)
      },
      quasarwpOnSubmitComment(evt) {
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
              this.quasarwpOnReset()
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
      }
    }
  }
  if (typeof vm !== 'undefined') vueObject.mixins = [vm]
  new Vue(vueObject)
</script>
