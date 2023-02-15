<?php 
global $qode_options;
global $more;
$more = 0;

$blog_hide_comments = "";
if (isset($qode_options['blog_hide_comments'])) {
	$blog_hide_comments = $qode_options['blog_hide_comments'];
}
$blog_hide_author = "";
if (isset($qode_options['blog_hide_author'])) {
    $blog_hide_author = $qode_options['blog_hide_author'];
}
$qode_like = "on";
if (isset($qode_options['qode_like'])) {
	$qode_like = $qode_options['qode_like'];
}
$wp_read_more = "off";
if (isset($qode_options['wp_read_more'])) {
    $wp_read_more = $qode_options['wp_read_more'];
}
$_post_format = get_post_format();

switch ($_post_format) {
    case "video":
        $icon_class = 'icon_film';
        break;
    case "audio":
        $icon_class = 'icon_volume-low';
        break;
    case "link":
        $icon_class = 'icon_link';
        break;
    case "gallery":
        $icon_class = 'icon_images';
        break;
    case "quote":
        $icon_class = 'icon_quotations';
        break;
    default:
        $icon_class = 'icon_document_alt';
}

$post_type_icon = '';
if (isset($qode_options['blog_masonry_post_format_icon']) && $qode_options['blog_masonry_post_format_icon'] == 'yes') {
    $post_type_icon = '<span class="q_font_elegant_holder q_icon_shortcode circle  "><span class="q_font_elegant_icon '.$icon_class.'"></span></span>';
}

$show_title_separator = false;
if(isset($qode_options['blog_masonry_title_separator']) && $qode_options['blog_masonry_title_separator'] == 'yes') {
	$show_title_separator = true;
}

$blog_masonry_text_align = "";
if (isset($qode_options['blog_masonry_text_align']) && $qode_options['blog_masonry_text_align'] != '') {
    $blog_masonry_text_align = $qode_options['blog_masonry_text_align'];
}


?>
<?php
	switch ($_post_format) {
		case "video":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<?php $_video_type = get_post_meta(get_the_ID(), "video_format_choose", true);?>
				<?php if($_video_type == "youtube") { ?>
					<iframe src="http://www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
				<?php } elseif ($_video_type == "vimeo"){ ?>
					<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				<?php } elseif ($_video_type == "self"){ ?> 
					<div class="video"> 
					<div class="mobile-video-image" style="background-image: url(<?php echo get_post_meta(get_the_ID(), "video_format_image", true);  ?>);"></div> 
					<div class="video-wrap"  > 
						<video class="video" poster="<?php echo get_post_meta(get_the_ID(), "video_format_image", true);  ?>" preload="auto"> 
							<?php if(get_post_meta(get_the_ID(), "video_format_webm", true) != "") { ?> <source type="video/webm" src="<?php echo get_post_meta(get_the_ID(), "video_format_webm", true);  ?>"> <?php } ?> 
							<?php if(get_post_meta(get_the_ID(), "video_format_mp4", true) != "") { ?> <source type="video/mp4" src="<?php echo get_post_meta(get_the_ID(), "video_format_mp4", true);  ?>"> <?php } ?> 
							<?php if(get_post_meta(get_the_ID(), "video_format_ogv", true) != "") { ?> <source type="video/ogg" src="<?php echo get_post_meta(get_the_ID(), "video_format_ogv", true);  ?>"> <?php } ?> 
							<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf"> 
								<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" /> 
								<param name="flashvars" value="controls=true&file=<?php echo get_post_meta(get_the_ID(), "video_format_mp4", true);  ?>" /> 
								<img src="<?php echo get_post_meta(get_the_ID(), "video_format_image", true);  ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" /> 
							</object> 
						</video>   
					</div></div> 
				<?php } ?>
                <?php echo $post_type_icon; ?>
			</div>
			<div class="post_text <?php if($show_title_separator) { echo 'with_title_separator'; } echo $blog_masonry_text_align; ?>">
				<div class="post_text_inner">
					<h5><a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
					
					<?php if($blog_hide_author == "no") { ?>
							<span class="post_author">
									<a class="post_author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="icon_pencil-edit" aria-hidden="true"></i><span><?php the_author_meta('display_name'); ?></span></a>
							</span>
					<?php } ?>

					<?php if($show_title_separator) { ?>
						<span class="separator small left"></span>
					<?php } ?>

                    <?php
                    if($wp_read_more == "off"){
                        qode_excerpt();
                    } else {
                        the_content('Read More');
                    }
                    ?>
					<div class="post_info">
						<span class="time">
								<i class="icon_clock_alt" aria-hidden="true"></i>
								<span><?php the_time('d.m.Y '); ?></span>
							</span>
						<?php if($blog_hide_comments != "yes"){ ?>
							<a class="post_comments" href="<?php comments_link(); ?>" target="_self">
							<i class="icon_comment_alt" aria-hidden="true"></i>
							<span><?php comments_number('0', '1', '%'); ?></span></a>
						<?php } ?>
						<?php if(isset($qode_options['enable_social_share'])  && $qode_options['enable_social_share'] == "yes") { ?>
									<?php echo do_shortcode('[social_share]'); ?>	
						<?php } ?>
					</div>
				</div>
			</div>
		</article>	

<?php
		break;
		case "audio":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<audio class="blog_audio" src="<?php echo get_post_meta(get_the_ID(), "audio_link", true) ?>" controls="controls">
					<?php _e("Your browser don't support audio player","qode"); ?>
				</audio>
			</div>
			<div class="post_text <?php if($show_title_separator) { echo 'with_title_separator'; } echo $blog_masonry_text_align; ?>">
				<div class="post_text_inner">
					<h5><a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
					<?php if($blog_hide_author == "no") { ?>
                                <span class="post_author">
									<a class="post_author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="icon_pencil-edit" aria-hidden="true"></i><span><?php the_author_meta('display_name'); ?></span></a>
								</span>
							<?php } ?>

					<?php if($show_title_separator) { ?>
						<span class="separator small left"></span>
					<?php } ?>

                    <?php
                    if($wp_read_more == "off"){
                        qode_excerpt();
                    } else {
                        the_content('Read More');
                    }
                    ?>
					<div class="post_info">
						<span class="time"><i class="icon_clock_alt" aria-hidden="true"></i>
								<span><?php the_time('d.m.Y '); ?></span></span>
						<?php if($blog_hide_comments != "yes"){ ?>
							<a class="post_comments" href="<?php comments_link(); ?>" target="_self">
							<i class="icon_comment_alt" aria-hidden="true"></i>
							<span><?php comments_number('0', '1', '%'); ?></span></a>
						<?php } ?>
						<?php if(isset($qode_options['enable_social_share'])  && $qode_options['enable_social_share'] == "yes") { ?>
									<?php echo do_shortcode('[social_share]'); ?>	
						<?php } ?>
					</div>
				</div>
			</div>
		</article>
<?php
		break;
		case "link":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post_content_holder">
					<div class="post_text <?php if($show_title_separator) { echo 'with_title_separator'; } echo $blog_masonry_text_align; ?>">
						<div class="post_text_inner">
							<div class="post_info">
								<span class="time">
								<i class="icon_clock_alt" aria-hidden="true"></i>
								<span><?php the_time('d.m.Y '); ?></span>
								</span>
								<?php if($blog_hide_comments != "yes"){ ?>
								<a class="post_comments" href="<?php comments_link(); ?>" target="_self">
								<i class="icon_comment_alt" aria-hidden="true"></i>
								<span><?php comments_number('0', '1', '%'); ?></span></a>
								<?php } ?>
								<?php if(isset($qode_options['enable_social_share'])  && $qode_options['enable_social_share'] == "yes") { ?>
									<?php echo do_shortcode('[social_share]'); ?>	
								<?php } ?>
							</div>
							
							<?php if($blog_hide_author == "no") { ?>
							<span class="post_author">
									<a class="post_author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="icon_pencil-edit" aria-hidden="true"></i><span><?php the_author_meta('display_name'); ?></span></a>
							</span>
					<?php } ?>
								
							<i class="link_mark fa fa-link pull-left"></i>
							<div class="post_title">
								<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
							</div>
						</div>
					</div>
				</div>
			</article>
<?php
		break;
		case "gallery":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post_image">
					<div class="flexslider">
						<ul class="slides">
							<?php
								$post_content = get_the_content();
								preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
								$array_id = explode(",", $ids[1]);
								
								foreach($array_id as $img_id){ ?>
									<li><a target="_self" href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $img_id, 'full' ); ?></a></li>
								<?php } ?>
						</ul>
					</div>
                    <?php echo $post_type_icon; ?>
				</div>
				<div class="post_text <?php if($show_title_separator) { echo 'with_title_separator'; } echo $blog_masonry_text_align; ?>">
					<div class="post_text_inner">
						<h5><a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
						<?php if($blog_hide_author == "no") { ?>
                                <span class="post_author">
									<a class="post_author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="icon_pencil-edit" aria-hidden="true"></i><span><?php the_author_meta('display_name'); ?></span></a>
								</span>
							<?php } ?>

						<?php if($show_title_separator) { ?>
							<span class="separator small left"></span>
						<?php } ?>

                        <?php
                        if($wp_read_more == "off"){
                            qode_excerpt();
                        } else {
                            the_content('Read More');
                        }
                        ?>
						<div class="post_info">
							<span class="time">
								<i class="icon_clock_alt" aria-hidden="true"></i>
								<span><?php the_time('d.m.Y '); ?></span>
							</span>
							<?php if($blog_hide_comments != "yes"){ ?>
								<a class="post_comments" href="<?php comments_link(); ?>" target="_self">
								<i class="icon_comment_alt" aria-hidden="true"></i>
								<span><?php comments_number('0', '1', '%'); ?></span></a>
							<?php } ?>
							<?php if(isset($qode_options['enable_social_share'])  && $qode_options['enable_social_share'] == "yes") { ?>
									<?php echo do_shortcode('[social_share]'); ?>	
							<?php } ?>
							
						</div>
					</div>
				</div>
			</article>
<?php
		break;
		case "quote":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				<div class="post_text <?php if($show_title_separator) { echo 'with_title_separator'; } echo $blog_masonry_text_align; ?>">
					<div class="post_text_inner">
						<div class="post_info">
							<span class="time">
								<i class="icon_clock_alt" aria-hidden="true"></i>
								<span><?php the_time('d.m.Y '); ?></span>
							</span>
							<?php if($blog_hide_comments != "yes"){ ?>
								<a class="post_comments" href="<?php comments_link(); ?>" target="_self">
								<i class="icon_comment_alt" aria-hidden="true"></i>
								<span><?php comments_number('0', '1', '%'); ?></span></a>
							<?php } ?>
							<?php if(isset($qode_options['enable_social_share'])  && $qode_options['enable_social_share'] == "yes") { ?>
									<?php echo do_shortcode('[social_share]'); ?>
							<?php } ?>
						</div>
						
						<?php if($blog_hide_author == "no") { ?>
                                <span class="post_author">
									<a class="post_author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="icon_pencil-edit" aria-hidden="true"></i><span><?php the_author_meta('display_name'); ?></span></a>
								</span>
						<?php } ?>
						
						<i class="qoute_mark icon_quotations pull-left"></i>
						<div class="post_title">
							<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), "quote_format", true); ?>
								<span class="quote_author">&mdash; <?php the_title(); ?></span>
								</a>
							</p>
							
						</div>
					</div>
				</div>
			</div>
		</article>
<?php
		break;
		default:
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="post_image">
					<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('full'); ?>
					</a>
                    <?php echo $post_type_icon; ?>
				</div>
			<?php } ?>
			<div class="post_text <?php if($show_title_separator) { echo 'with_title_separator'; } echo $blog_masonry_text_align; ?>">
				<div class="post_text_inner">
					<h5><a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
					<?php if($blog_hide_author == "no") { ?>
                                <span class="post_author">
									<a class="post_author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="icon_pencil-edit" aria-hidden="true"></i><span><?php the_author_meta('display_name'); ?></span></a>
								</span>
							<?php } ?>

					<?php if($show_title_separator) { ?>
						<span class="separator small left"></span>
					<?php } ?>

                    <?php
                    if($wp_read_more == "off"){
                        qode_excerpt();
                    } else {
                        the_content('Read More');
                    }
                    ?>
					<div class="post_info">
						<span class="time">
								<i class="icon_clock_alt" aria-hidden="true"></i>
								<span><?php the_time('d.m.Y '); ?></span>
							</span>
						<?php if($blog_hide_comments != "yes"){ ?>
							<a class="post_comments" href="<?php comments_link(); ?>" target="_self">
							<i class="icon_comment_alt" aria-hidden="true"></i>
							<span><?php comments_number('0', '1', '%'); ?></span></a>
						<?php } ?>
						<?php if(isset($qode_options['enable_social_share'])  && $qode_options['enable_social_share'] == "yes") { ?>
									<?php echo do_shortcode('[social_share]'); ?>	
						<?php } ?>
						
					</div>
				</div>
			</div>
		</article>
<?php
}
?>

