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
                    <?php include('components/home/grid3x3.php'); ?>
                <?php } ?>

                <?php if ($setting['frontpage-post-layout'] == 'stacked') { ?>
                    <?php include('components/home/stacked.php'); ?>
                <?php } ?>

            </q-page-container>
        </q-layout>
    </div>

    <?php get_footer(); ?>
    <?php include(get_template_directory() . '/components/quasarwp-scripts.php'); ?>
