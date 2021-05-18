<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<title><?php perch_pages_title(); ?></title>
	<?php perch_page_attributes(); ?>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet"> 
	<link href="/assets/css/stylesheet.css?v=<?php echo rand(); ?>" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://js.stripe.com/v3/"></script>
</head>
<body>
	<header class="background-primary">
		<div class="restrict">
			<div>
				<a class="button" href="/book-online/">Book Online</a>
			</div>
			<nav>
				<a class="menu button">&#8801; Menu</a>
				<?php perch_pages_navigation(); ?>
			</nav>
			<div>
				
			</div>
		</div>
	</header>