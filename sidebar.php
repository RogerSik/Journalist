<div id="sidebar">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

<div id="pages">
<h3><?php _e('Pages', 'journalist')?></h3>
<ul>
    <?php wp_list_pages('title_li='); ?>
</ul>
</div>

<h3><?php _e('Search', 'journalist');?></h3>
<p class="searchinfo"><?php _e('search site archives', 'journalist');?></p>
<div id="search">
<div id="search_area">
    <form id="searchform" method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <div>
        <input class="searchfield" type="text" name="s" id="s" value="" title="<?php _e('Enter keyword to search', 'journalist');?>" />
        <input class="submit" type="submit" value="<?php _e('search', 'journalist');?>" title="<?php _e('Click to search archives', 'journalist');?>" />
    </div>
    </form>
</div>
</div>

<h3><?php _e('Blogroll', 'journalist');?></h3>
<ul>
<?php get_links('-1', '<li>', '</li>', '', 0, 'name', 0, 0, -1, 0); ?>
</ul>

<h3><?php _e('Archives', 'journalist');?></h3>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>

<h3><?php _e('Categories', 'journalist');?></h3>
<ul>
    <?php wp_list_cats(); ?>
</ul>	

<h3>Meta</h3>
<ul>
    <li><?php // wp_register(); ?></li>
    <li><?php wp_loginout(); ?></li>
    <?php wp_meta(); ?>
</ul>
<?php endif; ?>

<!-- 
WordPress Plugin Theme Switcher 
http://wordpress.org/extend/plugins/theme-switcher/
-->
<?php if (function_exists('wp_theme_switcher')) { ?>
	<h3><?php _e('Themes', 'journalist');?></h3>
	<div class="themes">
	<?php wp_theme_switcher(); ?>
	</div>
	<?php } ?>
</div>
