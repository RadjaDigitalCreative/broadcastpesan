 <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
 <!-- JS Libraies -->
 <script src="{{ asset('admin/assets/bundles/datatables/datatables.min.js') }}"></script>
 <script src="{{ asset('admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('admin/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
 <!-- Page Specific JS File -->
 <script src="{{ asset('admin/assets/js/page/datatables.js') }}"></script>
 <!-- Template JS File -->
 <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
 <!-- Custom JS File -->
 <script src="{{ asset('admin/assets/js/custom.js') }}"></script>


 <script src="{{ asset('admin/assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
 <script src="{{ asset('admin/assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
 @yield('script')
 <script type="text/javascript">

 	function deleteRow(id)
 	{
 		swal({
 			title: "Apakah Anda Yakin?",
 			text: "Menghapus data ini!",
 			icon: "warning",
 			buttons: true,
 			dangerMode: true,
 		})
 		.then((willDelete) => {
 			if (willDelete) {
 				$('#data-'+id).submit();
 			}
 		});
 	}
 	$(document).ready(function () {
 		$(".select2").select2({
 		});
 	});
 </script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->
</html>