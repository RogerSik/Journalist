<?php get_header(); ?>

<div id="content">
<?php if (have_posts()) : ?>

<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
	 <h2 class="archive"><?php printf(__('Archive for the &#8216;%s&#8217; Category', 'journalist'), single_cat_title('', false));?></h2>

 	<?php /* If this is a tag archive */ } elseif(is_tag() ) { ?>
	 <h2 class="archive"><?php printf(__('Archive for the &#8216;%s&#8217; tag', 'journalist'), single_tag_title('', false));?></h2>

	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	 <h2 class="archive"><?php printf(_c('Archive for %s|Daily archive page', 'journalist'), get_the_time(__('F jS, Y', 'journalist')));?></h2>

	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	 <h2 class="archive"><?php printf(_c('Archive for %s|Monthly archive page', 'journalist'), get_the_time(__('F, Y', 'journalist')));?></h2>

	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	 <h2 class="archive"><?php printf(_c('Archive for %s|Yearly archive page', 'journalist'), get_the_time(__('Y', 'journalist')));?></h2>

	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	 <h2 class="archive"><?php _e('Author Archive', 'journalist');?></h2>

	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	 <h2 class="archive"><?php _e('Blog Archives', 'journalist');?></h2>
<?php } ?>

<?php while (have_posts()) : the_post(); ?>

<div class="post hentry<?php if (function_exists('sticky_class')) { sticky_class(); } ?>">
<h2 id="post-<?php the_ID(); ?>" class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<p class="comments"><a href="<?php comments_link(); ?>"><?php comments_number(__('without comments', 'journalist'),__('with one comment', 'journalist'),__('with % comments', 'journalist') );?></a></p>

<div class="main entry-content">
	<?php the_content(__('Read the rest of this entry &raquo;', 'journalist')); ?>
</div>

<div class="meta group">
<div class="signature">
    <p><?php printf(__('Written by %s', 'journalist'), the_author('', false));?> <span class="edit"><?php edit_post_link(__('Edit', 'journalist') );?></span></p>
    <p><?php echo the_date();?> <?php _e("at", 'journalist');?> <?php the_time();?></p>
</div>	
<div class="tags">
    <p><?php printf(__('Posted in %s', 'journalist'), get_the_category_list(','));?></p>
       <?php the_tags( '<p>' . __('Tags:', 'journalist') . ' ', ', ', '</p>'); ?>
</div>
</div>
</div><!-- END .hentry -->

<?php if ( comments_open() ) comments_template(); ?>

<?php endwhile; else: ?>
<div class="warning">
	<p><?php _e('Apologies, but we were unable to find what you were looking for. Perhaps searching will help.', 'journalist'); ?></p>
</div>
<?php endif; ?>

<div class="navigation group">
	<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'journalist') );?></div>
	<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'journalist') );?></div>
</div>

</div> 

<?php get_sidebar(); ?>

<?php get_footer(); ?>
