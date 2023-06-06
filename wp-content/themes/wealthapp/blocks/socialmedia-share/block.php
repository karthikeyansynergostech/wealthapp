<?php
$postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
?>

<ul class="vertical-social-media-links">
<li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank" ><img src="https://wealthapp.dotncube.in/wp-content/uploads/2023/05/facebook.png" alt="facebook" width="32" height="22"></a></li>
<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink());?>&source=testing" onClick="return popup(this, 'posts')" data-url="<?php echo the_permalink($post->ID); ?>" title="Share on LinkedIn" target="_blank"><img src="https://wealthapp.dotncube.in/wp-content/uploads/2023/05/twitter.png" alt="twitter" width="32" height="22"></a></li>
<li><a href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta( 'twitter' ); ?>" title="Tweet this" target="_blank"><img src="https://wealthapp.dotncube.in/wp-content/uploads/2023/05/linkedin.png" alt="linkedin" width="32" height="22"></a></li>
</ul>


