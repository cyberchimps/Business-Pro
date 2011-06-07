<?php

/*
	Section: Meta
	Authors: Trent Lapinski, Tyler Cunningham 
	Description: Creates post meta content.
	Version: 1.0	
*/

?>

<div class="meta">
<hr />
	Published by <?php the_author() ?> in <?php the_category(', ') ?> on <a href="<?php the_permalink() ?>"><?php the_time('F jS, Y') ?></a> <div class="comments"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>
<hr />
</div>
