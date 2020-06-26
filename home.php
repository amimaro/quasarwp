<?php

get_header();

include(get_template_directory() . '/components/header-functions.php');
?>

<body <?php body_class(); ?>>
    <div id="q-app" <?php if (isset($setting['show-loading'])) { ?>style="visibility: hidden;" <?php } ?>>
        <q-layout view="<?php echo $setting['layout']; ?>">

            <?php include(get_template_directory() . '/components/quasarwp-layout.php'); ?>

            <q-page-container>

                <?php if ($setting['frontpage-post-layout'] == 'grid3x3') { ?>
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
                <?php } ?>

                <?php if ($setting['frontpage-post-layout'] == 'stacked') { ?>
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
                <?php } ?>

            </q-page-container>
        </q-layout>
    </div>

    <?php get_footer(); ?>
    <?php include(get_template_directory() . '/components/quasarwp-scripts.php'); ?>
