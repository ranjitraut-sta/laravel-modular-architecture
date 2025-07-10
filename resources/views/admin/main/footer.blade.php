  <!--start overlay-->
  <div class="overlay toggle-btn-mobile"></div>
  <!--end overlay-->
  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
  <!--footer -->
  <div class="footer">
      <p class="mb-0">Copyright © {{ date('Y') }} A.M.D. Soft And Services Pvt.Ltd. | Developed By : <a
              href="https://amdsoft.com.np" target="_blank">AMD SOFT</a>
      </p>
  </div>
  <!-- end footer -->
  </div>
  <!-- end wrapper -->
  <!-- JavaScript -->
  <style>
      .ck-content p {
          height: 200px;
      }
  </style>

  <!-- Bootstrap JS -->
  <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('admin/assets/plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/assets/plugins/notifications/js/notifications.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/image.preview.js') }}"></script>
  <script src="{{ asset('admin/assets/js/slug-generate.js') }}"></script>
  <script src="{{ asset('admin/assets/js/customalert.js') }}"></script>
  <script src="{{ asset('admin/assets/js/custom.js') }}"></script>

  <script>
      $(document).ready(function() {
          $('#summernote').summernote({
              height: 300 // Set the height of the editor
          });
      });
  </script>

  <script>
      $(document).ready(function() {
          //Default data table
          $('#example').DataTable();
          var table = $('#example2').DataTable({
              lengthChange: false,
              buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
          });
          table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
      });
  </script>

  <script>
      $('.single-select').select2({
          theme: 'bootstrap4',
          width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
          placeholder: $(this).data('placeholder'),
          allowClear: Boolean($(this).data('allow-clear')),
      });
      $('.multiple-select').select2({
          theme: 'bootstrap4',
          width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
          placeholder: $(this).data('placeholder'),
          allowClear: Boolean($(this).data('allow-clear')),
      });
  </script>

  <script>
      $('#exampleVaryingModalContent').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text('New message to ' + recipient)
          modal.find('.modal-body input').val(recipient)
      });
  </script>

  <!-- App JS -->
  <script src="{{ asset('admin/assets/js/app.js') }}"></script>
