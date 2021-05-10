	<footer class="background-primary">
		<div class="restrict">
			<p>Whitby Coastal Cruises Ltd, 16 Westcliff Avenue, Whitby, North Yorkshire, YO21 3JB<br />Whitby Coastal Fishing is Owned and Operated by Whitby Coastal Cruises</p>
			<p>&copy; Whitby Coastal Cruises <?php echo date('Y'); ?> &bull; <a href="/privacy/">Privacy Policy</a> &bull; <a href="/book-online/">Cancellation Policy</a></p>
		</div>
	</footer>
	
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script>
		$('a.menu').click(function(){
			$('header nav ul').toggleClass('show');
		});
		$('.gallery ul').slick({
		  centerMode: true,
		  centerPadding: '60px',
		  arrows: false,
		  focusOnSelect: true,
		  adaptiveHeight: true,
		  slidesToShow: 4,
		  responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: false,
		        centerMode: true,
		        centerPadding: '40px',
		        slidesToShow: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: false,
		        centerMode: true,
		        centerPadding: '40px',
		        slidesToShow: 1
		      }
		    }
		  ]
		});
	</script>
	</body>
</html>