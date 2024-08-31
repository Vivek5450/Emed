<!-- footer -->

		<div class="footer">
			<div class="container">
				<center><p class="copy-right"><b>Designed by <a href="#">Miss. Saba Baroba | Miss. Palak Desai</a></b></p></center>
			</div>
		</div>
		<!-- /footer -->
			<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	</body>
</html>