
		</div>
		<!-- end wrapper -->

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

		<script>
		$('form').submit(function(event) {
			$('#send-button').prop("disabled", true);
			// add spinner to button
			$('#send-button').html(
			`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
			);
			return;
		});
		</script>

	</body>

</html>