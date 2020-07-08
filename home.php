<?php
get_header();
?>

<body <?php body_class(); ?>>
    <div id="q-app">
        <q-layout :view="qwpDataLayoutView">

            <?php get_template_part('components/quasarwp', 'layout'); ?>

            <q-page-container>
                <q-page class="qwp-home">
                    <div class="qwp-grid-3x3-container" v-if="qwpDataHomePostLayout === 'grid3x3'">
                        <?php
                        if (have_posts()) : while (have_posts()) : the_post();
                        ?>
                                <?php include('components/post-layout/grid3x3.php'); ?>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>

                    <div class="qwp-stacked-container" v-else>
                        <?php
                        if (have_posts()) : while (have_posts()) : the_post();
                        ?>
                                <?php include('components/post-layout/stacked.php'); ?>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </q-page>
            </q-page-container>
        </q-layout>
    </div>

    <?php get_footer(); ?>
    
