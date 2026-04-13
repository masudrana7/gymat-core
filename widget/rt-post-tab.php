<?php
/**
* Widget API: Post Tab Widget class
* By : Radius Theme
*/
Class GymatTheme_Post_Tab extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'rt-post-tab',
			'description' => esc_html__( 'Post Tab Widget' , 'gymat-core' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'rt-post-tab', esc_html__( 'Gymat : Posts Tab' , 'gymat-core' ), $widget_ops );
	}
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts' , 'gymat-core' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;

		$tab_id = $args['widget_id'];

		echo wp_kses_post( $args['before_widget'] );
		if ( $title ) {
			echo wp_kses_post( $args['before_title'] ) . $title . wp_kses_post( $args['after_title'] );
		}
		?>
		<div class="post-tab-layout">
			<ul class="btn-tab item-inline2 block-xs nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a href="#recent-<?php echo esc_html( $tab_id ); ?>" data-toggle="tab" aria-expanded="true" class="active"><?php esc_html_e( 'Recent', 'gymat-core' ); ?></a>
				</li>
				<li class="nav-item">
					<a href="#popular-<?php echo esc_html( $tab_id ); ?>" data-toggle="tab" aria-expanded="false"><?php esc_html_e( 'Popular', 'gymat-core' ); ?></a>
				</li>
				<li class="nav-item">
					<a href="#common-<?php echo esc_html( $tab_id ); ?>" data-toggle="tab" aria-expanded="false"><?php esc_html_e( 'Comment', 'gymat-core' ); ?></a>
				</li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade active show" id="recent-<?php echo esc_html( $tab_id ); ?>">
					<?php
						$recent_query = new WP_Query( apply_filters( 'widget_posts_args', array(
							'posts_per_page'      => $number,
							'no_found_rows'       => true,
							'post_status'         => 'publish',
							'ignore_sticky_posts' => true
						) ) );
						if ( $recent_query->have_posts() ) :
						while ( $recent_query->have_posts() ) : $recent_query->the_post();
					?>
					<div class="rt-post-tab-item">
						<div class="media">
							<?php if ( has_post_thumbnail() ) { ?>
							<a class="post-img-holder" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'media-object' ) ); ?>
							</a>
							<?php } ?>
							<div class="media-body">
								<h3 class="entry-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<div class="post-date"><i class="fas fa-calendar-alt"></i><?php echo get_the_time( get_option( 'date_format' ) ); ?></div>
							</div>
						</div>
					</div>
					<?php
						endwhile;
						wp_reset_postdata();
						endif;
					?>
				</div>

				<div role="tabpanel" class="tab-pane fade" id="popular-<?php echo esc_html( $tab_id ); ?>">
					<?php
						$popular_query = new WP_Query( apply_filters( 'widget_posts_args', array(
							'posts_per_page'      => $number,
							'no_found_rows'       => true,
							'post_status'         => 'publish',
							'orderby'             => 'meta_value_num',
							'meta_key'            => 'gymat_views',
							'ignore_sticky_posts' => true
						) ) );
						if ( $popular_query->have_posts() ) :
						while ( $popular_query->have_posts() ) : $popular_query->the_post();
					?>
					<div class="rt-post-tab-item">
						<div class="media">
							<?php if ( has_post_thumbnail() ) { ?>
							<a class="post-img-holder" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'media-object' ) ); ?>
							</a>
							<?php } ?>
							<div class="media-body">
								<h3 class="entry-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<div class="post-date"><i class="fas fa-calendar-alt"></i><?php echo get_the_time( get_option( 'date_format' ) ); ?></div>
							</div>
						</div>
					</div>
					<?php
						endwhile;
						wp_reset_postdata();
						endif;
					?>
				</div>

				<div role="tabpanel" class="tab-pane fade" id="common-<?php echo esc_html( $tab_id ); ?>">
					<?php
						$comment_query = new WP_Query( apply_filters( 'widget_posts_args', array(
							'posts_per_page'      => $number,
							'post_status'         => 'publish',
							'orderby'             => 'comment_count',
							'ignore_sticky_posts' => true
						) ) );
						if ( $comment_query->have_posts() ) :
						while ( $comment_query->have_posts() ) : $comment_query->the_post();
					?>
					<div class="rt-post-tab-item">
						<div class="media">
							<?php if ( has_post_thumbnail() ) { ?>
							<a class="post-img-holder" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'media-object' ) ); ?>
							</a>
							<?php } ?>
							<div class="media-body">
								<h3 class="entry-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<div class="post-date"><i class="fas fa-calendar-alt"></i><?php echo get_the_time( get_option( 'date_format' ) ); ?></div>
							</div>
						</div>
					</div>
					<?php
						endwhile;
						wp_reset_postdata();
						endif;
					?>
				</div>
			</div>
		</div>
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ) {
		$instance           = $old_instance;
		$instance['title']  = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		return $instance;
	}

	public function form( $instance ) {
		$title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'gymat-core' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'gymat-core' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3" />
		</p>
		<?php
	}
}
