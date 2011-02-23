<?php get_header(); ?>

<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post hentry<?php if (function_exists('sticky_class')) { sticky_class(); } ?>">
<h2 id="post-<?php the_ID(); ?>" class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<p class="comments"><a href="<?php comments_link(); ?>"><?php comments_number(__('without comments', 'journalist'),__('with one comment', 'journalist'),__('with % comments', 'journalist') );?></a></p>

<div class="main entry-content group">
	<?php the_content(__('Read the rest of this entry &raquo;', 'journalist')); ?>
	<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>

<div class="meta group">
<div class="signature">
    <p><?php printf(__('Written by %s', 'journalist'), the_author('', false));?> <span class="edit"><?php edit_post_link(__('Edit', 'journalist') );?></span></p>
    <p><?php echo the_date();?> <?php _e("at", 'journalist');?> <?php the_time();?></p>
</div>	
</div>
</div><!-- END .hentry -->

<?php if ( comments_open() ) comments_template('', true); ?>

<?php endwhile; else: ?>
<div class="warning">
	<p><?php _e('Apologies, but we were unable to find what you were looking for. Perhaps searching will help.', 'journalist'); ?></p>
</div>
<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
