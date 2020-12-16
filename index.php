<?php get_header(); ?>

<div class="container">
    <div class="row">
        <!--вывод постов-->
        <?php if(have_posts()) : ?>
            <!-- post  -->
            <?php while (have_posts()): the_post(); ?>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    </div>
                    <div class="card-body">
                        <?php if(has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('thumbnail', ['class' => 'float-left mr-3']); ?>
                        <?php else: ?>
                            <img src="https://picsum.photos/150/150"  width="150" height="150" alt="img" class="float-left mr-3">
                        <?php endif; ?>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Переход куда-нибудь</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <!-- post navigation-->
            <?php the_posts_pagination([
                'show_all'  => false,
                'end_size'  => 1,
                'mid_size'  => 2,
                'type'      => 'list'
            ]); ?>
            <!-- https://wp-kama.ru/function/the_posts_pagination -->
        <?php else: ?>
            <p>Постов нет...</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
