			</div> <!-- end container -->
		</div>
		<!-- end wrapper -->
		<!-- Footer -->
		<footer class="footer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						© 2022 <?= $web_title;?>.
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer -->

		<!-- javascript -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/modernizr.min.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/waves.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.nicescroll.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>

		<!-- KNOB JS -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/plugins/jquery-knob/excanvas.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>assets/plugins/jquery-knob/jquery.knob.js"></script> 

        <!-- Required datatable js -->
        <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script type="text/javascript" src="<?= base_url(); ?>assets/pages/datatables.init.js"></script>

        <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/dropify/js/dropify.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/pages/dropify.init.js"></script>

		<!-- App js -->
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/app.js"></script>

		<!-- JS Plugins Init. -->
		<script>
			function tour() {
				introJs().setOptions({
					disableInteraction: true,
					steps: [{
						intro: "Welcome, we will briefly explain our feature`s"
					}]
				}).start();
			}

			$(document).ready(function () {
					//  ckeditor
				$('textarea.editor').each(function () {
					CKEDITOR.replace($(this).attr('id'));
				});
			})

		</script>


	</body>

</html>