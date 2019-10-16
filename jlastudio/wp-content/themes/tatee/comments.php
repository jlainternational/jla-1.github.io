<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package modernx
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>
<h3 class="comment-title"><?php comments_number('0 Comments','1 Comment','% Comments'); ?></h3>
<ul class="comment-list <?php if (!have_comments()) { echo 'com-list-cus'; } ?>">
    <?php wp_list_comments('callback=tatee_theme_comment');  ?>

</ul>

<?php if(get_comment_pages_count()>1 && get_option( 'page_comments' )) { ?>
    <nav  class="navigation comment-navigation" role="navigation">
        <div class="nav-previous"><?php previous_comments_link( esc_html__( '<< Load Older Comments','tatee' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( esc_html__( '>> Load Newer Comments','tatee' ) ); ?></div>
    </nav>
<?php } ?>

<!-- Start Blog Comment -->
<?php if (  comments_open() ) { ?>
    <div class="comment-area-form"> 
        <?php
        if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        if ( is_singular() && !isset($_GET['replytocom']) ) { ?>
            <div class="comment-title">
                <h3><?php echo esc_html__('Leave a comment','tatee'); ?></h3>
            </div>
        <?php }

        echo '<small><?php cancel_comment_reply_link(); ?></small>';
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
            'id_form' => 'comment-form',

            'title_reply'=> '',
            'fields' => apply_filters( 'comment_form_default_fields', array(
                'comment-notes' => '',
                'author' => '<div class="row gutter-md">
                <div class="form-group col-md-6">
                <p class="comment-form-author  ">
                <input class="au-input-2 m-b-20" type="text" name="author" id="name2" placeholder="'.esc_attr__( 'Your Name','tatee' ).'">
                </p>
                </div>',   
                'email' => '
                <div class="form-group col-md-6">
                <p class="comment-form-email ">
                <input class="au-input-2 m-b-20" type="email" name="email" id="email2" placeholder="'.esc_attr__( 'Your Email','tatee' ).'">
                </p>
                </div>
                </div>',

            ) ),                                
            'comment_field' => '<div class="comment-form-comment ">
            <textarea name="comment"'.$aria_req.' class="au-textarea-2 m-b-20" rows="6" id="comments2" class="form-control " placeholder="'.esc_attr__( 'Your Comment','tatee' ).'"></textarea></div>
            ',                                                   
            'label_submit' => esc_html__('Send Comment','tatee'),
            'class_submit' => 'au-btn au-btn--solid'

        )
        ?>
        <?php comment_form($comment_args); ?>
    </div>
    <?php } ?>