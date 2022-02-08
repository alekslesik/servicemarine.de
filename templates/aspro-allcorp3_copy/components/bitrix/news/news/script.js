$( function() {
	$('.section-item').on('click', function() {
		$('.section-item').removeClass('active');
		$(this).addClass('active');
	});
})