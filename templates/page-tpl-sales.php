<?php /* Template Name: Sales/Promotion page */ get_header(); ?>
	<main role="main">
		<!-- section -->
		<section>
		 	<?php if ( has_post_thumbnail()) : ?>
		 		<div class="container">
					<div class="img-banner">
						<?php the_post_thumbnail('full', array( 'class' => 'img-fit' )); ?>
						<h1 class="main-cat-title"><b><?php the_title(); ?></b></h1>																	
					</div>
				</div>
			<?php else: ?>
				<h1 class="text-center text-bold main-title-page"><?php the_title(); ?></h1>
		 	<?php endif; ?>


		 	<div class="container">
		 		<div class="row">
		 			<div class="col-md-3">
		 				<?php get_sidebar(); ?>
		 			</div>
		 			<div class="col-md-9">
			 		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
						<div class="content-wrapper">
							<?php the_content(); ?>
						</div>
			
						<?php endwhile; ?>	
					<?php endif; ?>	
					</div>
				</div> 			
		 	</div>
		</section> 
		<!-- /section -->
	</main>
<?php get_footer(); ?>