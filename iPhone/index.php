<?php
	require_once('simplepie.inc');
	
	// CHANGE THE FEED ADDRESS BELOW - THAT'S IT!
	$feed = new SimplePie('http://feeds.feedburner.com/CssTricks');
	
	$feed->handle_content_type();
	
	$total_articles = 5;
	
	for ($x = 0; $x < $feed->get_item_quantity($total_articles); $x++)
	{
		$first_items[] = $feed->get_item($x);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
 
	<title>iPhone Interface by CSS-Tricks</title>
	
	<link rel="stylesheet" type="text/css" href="style.css" />
	
	<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	
		$('.headline:eq(0)').click(function() {
			$("#mask").animate({
				left: "-320px"
			});
		});
		
		$('.headline:eq(1)').click(function() {
			$("#mask").animate({
				left: "-640px"
			});
		});
		
		$('.headline:eq(2)').click(function() {
			$("#mask").animate({
				left: "-960px"
			});
		});
		
		$('.headline:eq(3)').click(function() {
			$("#mask").animate({
				left: "-1280px"
			});
		});
		
		$('.headline:eq(4)').click(function() {
			$("#mask").animate({
				left: "-1500px"
			});
		});
		
		 
$('.back').click(function() {
	$("#mask").animate({
		left: "0px"
	});
	$('html, body').animate({scrollTop:0}, 'slow'); 
});

$('#home').click(function() {
	$("#mask").animate({
		left: "0px"
	});
	$('html, body').animate({scrollTop:0}, 'slow'); 
});
	
	});
	</script>
</head>

<body>

	<div id="page-wrap">
	
		<h1 id="home"><?php echo $feed->get_title(); ?></h1>
		
		<div id="slider">
				
			<div id="mask">
				
				<div id="mainMenu">
					<?php
						foreach ($first_items as $item)
						{
							echo '<div class="headline"><h2>' . $item->get_title() . '</h2><p style="margin: 0;">' . $item->get_date('j M Y') . '</p></div><img src="images/bottom.png" alt="" style="margin: 0 0 10px 5px;" />';
						}
					?>
				</div>
				
				<?php
					foreach ($first_items as $item)
					{
						echo '<div class="article-text"><h1><a href="' . $item->get_permalink() .'">' . $item->get_title() . '</a></h1><p>' . $item->get_date('j M Y') . '</p><p>' . $item->get_content() . '</p><a class="back"><img src="images/backbutton.png" alt="Back" /></a></div>';
					}
				?>
				
			</div>
			
		</div>
		
	</div>
	
</body>

</html>
	
