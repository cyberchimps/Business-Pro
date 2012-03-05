<?php

/*
	Footer
	Establishes the widgetized footer and static post-footer section of Business Pro. 
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/

global $options, $themeslug;

?>
</div>
<?php if ($options->get($themeslug.'_disable_footer') != "0"):?>	

	<div id="footer">
     	<div class="container">
     		<div class="row">
    	
	<!-- Begin @business footer hook content-->
		<?php business_footer(); ?>
	<!-- End @business footer hook content-->
	
	<?php endif;?>
	

		</div><!--end footer_wrap-->
	</div><!--end footer-->
</div> 

<?php if ($options->get($themeslug.'_disable_afterfooter') != "0"):?>

	<div id="afterfooter">
		<div id="afterfooterwrap">
		<div class="container">
		<div class="row">	
		<!-- Begin @business afterfooter hook content-->
			<?php business_secondary_footer(); ?>
		<!-- End @business afterfooter hook content-->
		</div>  <!--end afterfooterwrap-->	
	</div> <!--end afterfooter-->	
		</div> 	
		</div>
	<?php endif;?>
	
	<?php wp_footer(); ?>	
</body>

</html>
