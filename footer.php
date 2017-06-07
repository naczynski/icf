<footer id="footer" class="dark">
	<div id="copyrights">
		<div class="container clearfix">
			<div class="col_half">
				Copyrights &copy; 2016 All Rights Reserved by ICF WOOD.<br>
			</div>
			<div class="col_half col_last tright">
				<div class="copyrights-menu copyright-links clearfix">
					<a href="#">Strona główna</a>/<a href="#">O nas</a>/<a href="#">Oferta</a>/<a href="#">Katalogi</a>/<a href="#">Kontakt</a>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>

<div id="gotoTop" class="icon-angle-up"></div>

<?php wp_footer(); ?>

	<script type="text/javascript">

		jQuery(window).load(function(){

			// Google Map
			jQuery('#headquarters-map').gMap({
				address: 'Polska',
				maptype: 'ROADMAP',
				zoom: 6,
				markers: [
					{
						address: "Wrocław, Polska",
						html: "Tutaj będzie POPUP z danymi tej firmy.",
						icon: {
							image: "<?php echo get_template_directory_uri(); ?>/assets/images/icons/map-icon.png",
							iconsize: [22, 32],
							iconanchor: [14,44]
						}
					},
					{
						address: "Poznań, Polska",
						html: "Tutaj będzie POPUP z danymi tej firmy.",
						icon: {
							image: "<?php echo get_template_directory_uri(); ?>/assets/images/icons/map-icon.png",
							iconsize: [22, 32],
							iconanchor: [14,44]
						}
					},
					{
						address: "Praga, Czechy",
						html: "Tutaj będzie POPUP z danymi tej firmy.",
						icon: {
							image: "<?php echo get_template_directory_uri(); ?>/assets/images/icons/map-icon.png",
							iconsize: [22, 32],
							iconanchor: [14,44]
						}
					},
					{
						address: "Bornheim, Niemcy",
						html: "Tutaj będzie POPUP z danymi tej firmy.",
						icon: {
							image: "<?php echo get_template_directory_uri(); ?>/assets/images/icons/map-icon.png",
							iconsize: [22, 32],
							iconanchor: [14,44]
						}
					},
					{
						address: "Warszawa, Polska",
						html: "Tutaj będzie POPUP z danymi tej firmy.",
						icon: {
							image: "<?php echo get_template_directory_uri(); ?>/assets/images/icons/map-icon.png",
							iconsize: [22, 32],
							iconanchor: [14,44]
						}
					},
					{
						address: "Kraków, Polska",
						html: "Tutaj będzie POPUP z danymi tej firmy.",
						icon: {
							image: "<?php echo get_template_directory_uri(); ?>/assets/images/icons/map-icon.png",
							iconsize: [22, 32],
							iconanchor: [14,44]
						}
					},
					{
						address: "Katowice, Polska",
						html: "Tutaj będzie POPUP z danymi tej firmy.",
						icon: {
							image: "<?php echo get_template_directory_uri(); ?>/assets/images/icons/map-icon.png",
							iconsize: [22, 32],
							iconanchor: [14,44]
						}
					},
					{
						address: "Łódź, Polska",
						html: "Tutaj będzie POPUP z danymi tej firmy.",
						icon: {
							image: "<?php echo get_template_directory_uri(); ?>/assets/images/icons/map-icon.png",
							iconsize: [22, 32],
							iconanchor: [14,44]
						}
					},
					{
						address: "Szczecin, Polska",
						html: "Tutaj będzie POPUP z danymi tej firmy.",
						icon: {
							image: "<?php echo get_template_directory_uri(); ?>/assets/images/icons/map-icon.png",
							iconsize: [22, 32],
							iconanchor: [14,44]
						}
					},
					{
						address: "Sopot, Polska",
						html: "Tutaj będzie POPUP z danymi tej firmy.",
						icon: {
							image: "<?php echo get_template_directory_uri(); ?>/assets/images/icons/map-icon.png",
							iconsize: [22, 32],
							iconanchor: [14,44]
						}
					},
					{
						address: "Olsztyn, Polska",
						html: "Tutaj będzie POPUP z danymi tej firmy.",
						icon: {
							image: "<?php echo get_template_directory_uri(); ?>/assets/images/icons/map-icon.png",
							iconsize: [22, 32],
							iconanchor: [14,44]
						}
					},
				],
				doubleclickzoom: false,
				controls: {
					panControl: false,
					zoomControl: true,
					mapTypeControl: false,
					scaleControl: false,
					streetViewControl: false,
					overviewMapControl: false
				},
				styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
			});

		});

	</script>
</body>
</html>