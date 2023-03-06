<?php
    if(!is_user_logged_in()) {
        wp_redirect(site_url('/'));
    }
  get_header();

  while(have_posts()) {
    the_post();
    pageBanner();
    ?>
    

    <div class="container container--narrow page-section">
        <div class="create-note">
            <h2>Create New Note</h2>
            <input class="new-note-title" placeholder="New Title">
            <textarea class="new-note-body" placeholder="Your note here"></textarea>
            <span class="submit-note">Create</span>
            <span class="note-limit-message">Your are Limited.</span>
        </div>
        <ul class="min-list link-list" id="my-notes">
            <?php 
            $noteUser = new WP_Query(array(
                'post_type' => 'note',
                'posts_per_page' => -1,
                'author' => get_current_user_id()
            ));

            while ($noteUser->have_posts()) {
                $noteUser->the_post(); ?>
                <li data-id="<?php the_ID();?>">
                    <input readonly class="note-title-field" value="<?php echo str_replace(
                        'Private: ', '', esc_attr(get_the_title())
                    );?>">
                    <span class="edit-note" ><i class="fa fa-pencil" aria-hidden="true"></i> Edit</span>
                    <span class="delete-note"><i class="fa fa-trash" aria-hidden="true"></i> Delete</span>
                    <textarea readonly class="note-body-field"><?php echo esc_attr(wp_strip_all_tags(get_the_content()));?></textarea>
                    <span class="update-note btn btn--small btn--blue"><i class="fa fa-arrow-right" aria-hidden="true"></i> Save</span>
                </li>

            <?php }
            ?>
        </ul>
    </div>
    
  <?php }

  get_footer();

?>