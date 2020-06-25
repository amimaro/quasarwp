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

                <?php if ($setting['frontpage-post-layout'] == 'vertical') { ?>
                    <!-- Vertical Layout -->
                    <div class="q-pa-md row items-start q-gutter-md">
                        <?php
                        if (have_posts()) : while (have_posts()) : the_post();
                        ?>
                                <q-card class="post-card cursor-pointer" v-bind:class="{ 'post-card-vertical': isDesktop }" @click="themeRouteTo('<?php the_permalink(); ?>')">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <q-img src="<?php the_post_thumbnail_url('smallest'); ?>" :ratio="4/3" alt=""></q-img>
                                    <?php endif ?>
                                    <q-card-section>
                                        <div class="text-h6">
                                            <?php the_title(); ?>
                                            <?php if (isset($setting['frontpage-show-post-author'])) { ?>
                                                <div class="text-caption">
                                                    <?php _e('by') ?> <?php the_author(); ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </q-card-section>

                                    <q-card-section class="q-pt-none">
                                        <?php if (isset($setting['frontpage-show-post-excerpt'])) { ?>
                                            <?php the_excerpt(''); ?>
                                        <?php } ?>
                                        <div class="row justify-between">
                                            <?php if (isset($setting['frontpage-show-post-comments-counter'])) { ?>
                                                <div class="text-caption">
                                                    <?php echo get_comments_number(get_post()->ID); ?>
                                                    <?php _e('Comments'); ?>
                                                </div>
                                            <?php } ?>
                                            <?php if (isset($setting['frontpage-show-post-date'])) { ?>
                                                <div class="text-caption"><?php echo get_the_date(); ?></div>
                                            <?php } ?>
                                        </div>
                                    </q-card-section>
                                </q-card>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                <?php } ?>

                <?php if ($setting['frontpage-post-layout'] == 'horizontal') { ?>
                    <!-- Horizontal Layout -->
                    <div class="q-pa-xl row items-start q-gutter-lg">
                        <?php
                        if (have_posts()) : while (have_posts()) : the_post();
                        ?>
                                <q-card v-if="isDesktop" class="post-card post-card-horizontal cursor-pointer" @click="themeRouteTo('<?php the_permalink(); ?>')">
                                    <q-card-section horizontal>
                                        <?php if (has_post_thumbnail()) : ?>
                                            <q-img class="col-5" src="<?php the_post_thumbnail_url('smallest'); ?>" :ratio="4/3" alt=""></q-img>
                                        <?php endif ?>
                                        <q-card-section>
                                            <div class="text-h6">
                                                <?php the_title(); ?>
                                                <?php if (isset($setting['frontpage-show-post-author'])) { ?>
                                                    <div class="text-caption">
                                                        <?php _e('by') ?> <?php the_author(); ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="row justify-between">
                                                <?php if (isset($setting['frontpage-show-post-comments-counter'])) { ?>
                                                    <div class="text-caption">
                                                        <?php echo get_comments_number(get_post()->ID); ?>
                                                        <?php _e('Comments'); ?>
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($setting['frontpage-show-post-date'])) { ?>
                                                    <div class="text-caption"><?php echo the_time('F d, Y'); ?></div>
                                                <?php } ?>
                                            </div>
                                            <br>
                                            <?php the_excerpt(''); ?>
                                        </q-card-section>
                                    </q-card-section>
                                </q-card>
                                <q-card v-else class="post-card cursor-pointer" v-bind:class="{ 'post-card-vertical': isDesktop }" @click="themeRouteTo('<?php the_permalink(); ?>')">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <q-img src="<?php the_post_thumbnail_url('smallest'); ?>" :ratio="4/3" alt=""></q-img>
                                    <?php endif ?>
                                    <q-card-section>
                                        <div class="text-h6">
                                            <?php the_title(); ?>
                                            <?php if (isset($setting['frontpage-show-post-author'])) { ?>
                                                <div class="text-caption">
                                                    <?php _e('by') ?> <?php the_author(); ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </q-card-section>

                                    <q-card-section class="q-pt-none">
                                        <?php the_excerpt(''); ?>
                                        <div class="row justify-between">
                                            <?php if (isset($setting['frontpage-show-post-comments-counter'])) { ?>
                                                <div class="text-caption">
                                                    <?php echo get_comments_number(get_post()->ID); ?>
                                                    <?php _e('Comments'); ?>
                                                </div>
                                            <?php } ?>
                                            <?php if (isset($setting['frontpage-show-post-date'])) { ?>
                                                <div class="text-caption"><?php echo the_time('F d, Y'); ?></div>
                                            <?php } ?>
                                        </div>
                                    </q-card-section>
                                </q-card>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                <?php } ?>

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
        })
    </script>
