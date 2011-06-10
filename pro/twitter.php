<?php
/*

	Section: Twitter
	Authors: Trent Lapinski, Tyler Cunningham
	Description: Creates the call out section.
	Version: 0.1
	
*/
	$options = get_option('business') ;  
    $handle = $options['bu_twitter_bar'];
	$tdurl = get_template_directory_uri();
?>
	
<div id="twitterbar"><!--id="twitterbar"-->
	<div class="twittertext">
		<a href=" http://twitter.com/<?php echo $handle ; ?>" > <img src="<?php echo "$tdurl/images/twitterbird.png" ?>" alt="twitter"/> <?php echo $handle ;?> - </a><?php twitter_messages($handle); ?>
	</div>
</div><!--end twitterbar-->
