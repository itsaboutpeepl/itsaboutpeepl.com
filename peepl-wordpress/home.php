<?php /* Template Name: Peepl Blog */ ?>

<?php get_header(); ?>

<main id="main" class="site-main" role="main">

    <div class="hero wp-block-group alignfull">
        <div class="wp-block-group__inner-container">
            <div class="wp-block-group alignwide" style="padding-right: 24%;">
                <div class="wp-block-group__inner-container">
                    <h2 class="alignwide has-text-align-left has-black-color has-text-color">Find out more about what interests and inspires Peepl</h2>
                    <p class="has-black-color has-text-color has-large-font-size">Here you can find blogs written by the Peepl team, our shareholders and from the wider Liverpool, and international, community.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="wp-block-group alignfull">
        <div class="wp-block-group__inner-container">
            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
            <?php if(1 == $paged) : //(if we're on page 1) ?>
            <div class="wp-block-columns alignwide">
                <div class="wp-block-column">
                    <main class="blog-grid extrawide">
                        <article class="new-article-heading">New article</article>
                        <article class="featured-article-heading">A favourite from the archive</article>
                    </main>
                </div>
            </div>

            
            <div class="wp-block-columns alignwide">
                <div class="wp-block-column">
                    <main class="blog-grid extrawide">
                        <?php $args = array(
                                'numberposts' => 1,
                                'post_status' => 'publish',
                            );

                            $featured_posts = get_posts($args);
                        ?>
                        <?php if( ! empty( $featured_posts ) ): ?>
                            <?php foreach ( $featured_posts as $p ) : ?>
                                <a href="<?php echo get_permalink( $p->ID ) ?>">
                                <article class="featured-article" style="background-image: linear-gradient(130deg, rgba(252, 12, 26, 0.4) 0%, rgba(43, 112, 223, 0.4) 100%), url(<?php echo get_the_post_thumbnail_url($p->ID); ?>); background-position: 35% 86%; background-size: cover;">
                                    <h5 class="new-article-image-date">15th January 2021</h5>
                                    <h3 class="new-article-title"><?php echo get_the_title($p->ID); ?></h3>
                                    <h4 class="new-article-image-author">by <?php echo get_the_author_meta( 'nicename', $p->post_author ); ?></h4>
                                </article>
                            </a>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php $args = array(
                                'numberposts' => 1,
                                'post_status' => 'publish',
                                'tag' => 'featured'
                            );

                            $featured_posts = get_posts($args);
                        ?>
                        <?php if( ! empty( $featured_posts ) ): ?>
                            <?php foreach ( $featured_posts as $p ) : ?>
                                <a href="<?php echo get_permalink( $p->ID ) ?>">
                                <article class="featured-article" style="background-image: linear-gradient(130deg, rgba(252, 12, 26, 0.4) 0%, rgba(43, 112, 223, 0.4) 100%), url(<?php echo get_the_post_thumbnail_url($p->ID); ?>); background-position: 35% 86%; background-size: cover;">
                                    <h5 class="featured-article-image-date">29th December 2021</h5>
                                    <h3 class="featured-article-title"><?php echo get_the_title($p->ID); ?></h3>
                                    <h4 class="featured-article-image-author">by <?php echo get_the_author_meta( 'nicename', $p->post_author ); ?></h4>
                                </article>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </main>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if ( have_posts() ) : ?>
            <div class="wp-block-columns alignwide">
                <div class="wp-block-column">
                    <?php
                        // Start the loop.
                        while ( have_posts() ) : the_post();
                    ?>
                    <main class="secondary-grid extrawide">
                        <?php 
                            if(has_post_thumbnail()) :
                        ?>
                            <a href="<?php echo get_permalink(); ?>"><article class="related-article-image" style="background-image: linear-gradient(130deg, rgba(252, 12, 26, 0.3) 0%, rgba(43, 112, 223, 0.3) 100%), url(<?php echo get_the_post_thumbnail_url(); ?>); background-position: 35% 86%; background-size: cover;"></article></a>
                        <?php 
                            else:
                        ?>
                           <a href="<?php echo get_permalink(); ?>"><article class="related-article-image"></article></a>
                        <?php 
                            endif;
                        ?>
                        <article class="related-article-title">
                            <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="related-article-desc"><?php echo get_the_excerpt(); ?></p>
                        </article>
                    </main>
                    <?php 
                        // End the loop.
                        endwhile;
                    ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    

    <div class="wp-block-group is-style-default extrawide">
        <div class="wp-block-group__inner-container">
            <div class="wp-block-buttons alignwide is-content-justification-center">
                <div class="wp-block-button is-style-outline">
                    <?php next_posts_link( 'Older posts' ); ?>
                    <?php previous_posts_link( 'Newer posts' ); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="wp-block-group alignfull">
        <div class="wp-block-group__inner-container">
            <div class="frm_forms  with_frm_style frm_style_formidable-style" id="frm_form_4_container" data-token="8ca6a7f758e43b1b3ad9adffa355c17b">
                <form enctype="multipart/form-data" method="post" class="frm-show-form  frm_js_validate  frm_pro_form  frm_ajax_submit " id="form_newsletter-subscription" data-token="8ca6a7f758e43b1b3ad9adffa355c17b">
                    <div class="frm_form_fields ">
                        <fieldset>
                            <legend class="frm_screen_reader">Newsletter subscription</legend>
                            <div class="frm_fields_container">
                                <input type="hidden" name="frm_action" value="create">
                                <input type="hidden" name="form_id" value="4">
                                <input type="hidden" name="frm_hide_fields_4" id="frm_hide_fields_4" value="">
                                <input type="hidden" name="form_key" value="newsletter-subscription">
                                <input type="hidden" name="item_meta[0]" value="">
                                <input type="hidden" id="frm_submit_entry_4" name="frm_submit_entry_4" value="ec52c20135">
                                <input type="hidden" name="_wp_http_referer" value="/new-blog/"><div id="frm_field_39_container" class="frm_form_field form-field form-field-style  frm_required_field frm_top_container frm_full">
                                <label for="field_29yf4d2" id="field_29yf4d2_label" class="form-primary-label">Subscribe to our newsletter!
                                    <span class="frm_required" aria-hidden="true">*</span>
                                </label>
                                <input type="email" id="field_29yf4d2" name="item_meta[39]" value="" placeholder="Enter your email address" data-reqmsg="This field cannot be blank." aria-required="true" data-invmsg="Please enter a valid email address." aria-invalid="false">
                            </div>
                                <input type="hidden" name="item_key" value="">
                                    <div class="frm_verify" aria-hidden="true">
                                        <label for="frm_email_4">If you are human, leave this field blank.</label>
                                        <input type="text" class="frm_verify" id="frm_email_4" name="frm_verify" value="">
                                    </div>
                                <input name="frm_state" type="hidden" value="eVEQ81eu50lhKDeLCl59xLYbbhhu5yzn7+1k1IxTlGI="><div class="wp-block-button has-custom-font-size is-style-outline has-medium-font-size">

                                <button class="frm_button_submit frm_final_submit wp-block-button__link has-black-color has-text-color" type="submit" style="font-size: 16px !important" formnovalidate="formnovalidate">Subscribe</button>
                            </div>
                        </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>