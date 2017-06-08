<div class="sider-bar">
    <?php if ( ! dynamic_sidebar( 'default' ) ) : ?>
        <div class="tagcloud">
            <?php the_tags(' ',' '); ?>
        </div>
    <?php endif; ?>
</div>
