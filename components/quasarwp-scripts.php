<script>
  let vueObject = {
    el: '#q-app',
    data: function() {
      return {
        isMobile: this.$q.platform.is.mobile,
        isDesktop: this.$q.platform.is.desktop,
        qwpDataCommentFormDialog: false,
        qwpDataReplyCommentId: null,
        qwpDataReplyCommentAuthor: '',
        qwpLeft: false,
        qwpRight: false,
        qwpAuthor: '',
        qwpEmail: '',
        qwpComment: '',
        qwpSearch: '',
        qwpDataHeaderReveal: '<?php echo get_theme_mod('layout_header_reveal'); ?>',
        qwpDataHeaderSeparator: '<?php echo get_theme_mod('layout_header_separator'); ?>',
        qwpDataFooterReveal: '<?php echo get_theme_mod('layout_footer_reveal'); ?>',
        qwpDataFooterSeparator: '<?php echo get_theme_mod('layout_footer_separator'); ?>',
        qwpDataLeftDrawerShowIfAbove: '<?php echo get_theme_mod('layout_ldrawer_show_if_above'); ?>',
        qwpDataLeftDrawerOverlay: '<?php echo get_theme_mod('layout_ldrawer_overlay'); ?>',
        qwpDataLeftDrawerSeparator: '<?php echo get_theme_mod('layout_ldrawer_separator'); ?>',
        qwpDataLeftDrawerBehavior: '<?php echo get_theme_mod('layout_ldrawer_behavior'); ?>',
        qwpDataRightDrawerShowIfAbove: '<?php echo get_theme_mod('layout_rdrawer_show_if_above'); ?>',
        qwpDataRightDrawerOverlay: '<?php echo get_theme_mod('layout_rdrawer_overlay'); ?>',
        qwpDataRightDrawerSeparator: '<?php echo get_theme_mod('layout_rdrawer_separator'); ?>',
        qwpDataRightDrawerBehavior: '<?php echo get_theme_mod('layout_rdrawer_behavior'); ?>',
        qwpDataTabsAlign: '<?php echo get_theme_mod('layout_tabs_align'); ?>',
        qwpDataHomePostLayout: '<?php echo get_theme_mod('layout_home_postlayout'); ?>',
        qwpDataLoadingEnabled: '<?php echo get_theme_mod('settings_loading_enabled'); ?>',
        qwpDataLayoutView: '<?php echo get_theme_mod('settings_layout_view'); ?>',
      }
    },
    created() {
      if (this.qwpDataLoadingEnabled) {
        this.$q.loading.show()
      }

      const s = new URL(window.location.href).searchParams.get("s")
      if (s) this.qwpSearch = s
    },
    mounted() {
      if (this.qwpDataLoadingEnabled) {
        this.$nextTick(function() {
          setTimeout(() => {
            this.$q.loading.hide()
            document.getElementById('q-app').style.visibility = 'visible'
          }, 500)
        })
      }
    },
    computed: {
      qwpComputedHeaderReveal: function() {
        return this.qwpDataHeaderReveal ? true : false;
      },
      qwpComputedFooterReveal: function() {
        return this.qwpDataFooterReveal ? true : false;
      },
      qwpComputedLeftDrawerShowIfAbove: function() {
        return this.qwpDataLeftDrawerShowIfAbove ? true : false;
      },
      qwpComputedRightDrawerShowIfAbove: function() {
        return this.qwpDataRightDrawerShowIfAbove ? true : false;
      },
      qwpComputedLeftDrawerOverlay: function() {
        return this.qwpDataLeftDrawerOverlay ? true : false;
      },
      qwpComputedRightDrawerOverlay: function() {
        return this.qwpDataRightDrawerOverlay ? true : false;
      },
    },
    methods: {
      qwpSelectSeparator(separator, layout) {
        if (layout === 'header')
          return separator === this.qwpDataHeaderSeparator
        if (layout === 'footer')
          return separator === this.qwpDataFooterSeparator
        if (layout === 'ldrawer')
          return separator === this.qwpDataLeftDrawerSeparator
        if (layout === 'rdrawer')
          return separator === this.qwpDataRightDrawerSeparator
        return false
      },
      quasarwpRouteTo(permalink) {
        document.location.href = permalink
      },
      qwpHideCommentDialog() {
        this.qwpDataReplyCommentId = null
        this.qwpDataReplyCommentAuthor = ''
        this.qwpDataCommentFormDialog = false
      },
      qwpReplyComment(commentId, author) {
        this.qwpDataReplyCommentId = commentId
        this.qwpDataReplyCommentAuthor = author
        this.qwpShowCommentDialog()
      },
      qwpShowCommentDialog() {
        this.qwpCommentFormOnReset()
        this.qwpDataCommentFormDialog = true
        setTimeout(() => {
          <?php if (is_user_logged_in()) { ?>
            this.$refs['qwpCommentContent'].$el.focus()
          <?php } else { ?>
            this.$refs['qwpCommentAuthorName'].$el.focus()
          <?php } ?>
        }, 100)
      },
      qwpCommentFormOnReset() {
        this.qwpAuthor = null
        this.qwpEmail = null
        this.qwpComment = null
        setTimeout(() => {
          this.$refs.qwpCommentForm.resetValidation()
        }, 100)
      },
      qwpCommentFormOnSubmit(evt) {
        evt.preventDefault();

        let data = {
          post: evt.target.comment_post_ID.value,
          content: evt.target.comment.value,
          parent: this.qwpDataReplyCommentId,
        };
        console.log(data, 1)
        <?php if (is_user_logged_in()) {
          $successMessage = __('Done', 'quasarwp');
        ?>
          data['author_name'] = '<?php echo wp_get_current_user()->display_name; ?>'
          data['author_email'] = '<?php echo wp_get_current_user()->user_email; ?>'
        <?php } else {
          $successMessage = __('Your comment is awaiting moderation.', 'quasarwp');
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
              this.qwpHideCommentDialog()
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
  const qwpVueObj = new Vue(vueObject)
</script>
