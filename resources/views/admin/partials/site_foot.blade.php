    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="d-block d-md-inline-block">Copyright  &copy; {{ date('Y') }} <a class="text-bold-800 grey darken-2" href="http://unilinkindia.com/" target="_blank"> UnilinkIndia </a>, All rights reserved. </span></p>
    </footer>

    <script>
        $('#summernote').summernote({
            height: 300
        });
    </script>

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('public/assets/admin/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('public/assets/admin/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/jszip.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/buttons.colVis.min.js') }}"></script>
    <!-- END PAGE VENDOR JS-->
    <script src="{{ asset('public/assets/admin/vendors/js/extensions/moment.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/extensions/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/js/core/libraries/jquery_ui/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('public/assets/admin/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/pickers/dateTime/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/pickers/daterange/daterangepicker.js') }}"></script>

    <!-- BEGIN ROBUST JS-->
    <script src="{{ asset('public/assets/admin/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/js/core/app.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/js/scripts/customizer.min.js') }}"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('public/assets/admin/js/scripts/pickers/dateTime/pick-a-datetime.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/js/scripts/extensions/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/js/scripts/forms/select/form-select2.min.js') }}"></script>
    <!-- END PAGE LEVEL JS-->
    <script src="{{ asset('public/assets/admin/vendors/js/editors/summernote/summernote.js') }}"></script>
     <script src="{{ asset('public/assets/admin/js/scripts/editors/editor-summernote.min.js') }}"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>  
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/js-yaml/3.6.0/js-yaml.min.js"> </script>  
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"> </script>  
    <script>  
    $.get('https://raw.githubusercontent.com/FortAwesome/Font-Awesome/fa-4/src/icons.yml', function(data) {  
           var parsedYaml = jsyaml.load(data);  
        var options = new Array();  
        $.each(parsedYaml.icons, function(index, icon){  
            options.push({  
                id: icon.id,  
                text: '<i class="fa fa-fw fa-' + icon.id + '"></i> ' + icon.id  
            });  
      });  
        $('#select_icon').select2({  
            data: options,  
            escapeMarkup: function(markup) {  
                return markup;  
            }  
        });  
        $("#icon_select").html('<i class="fa fa-2x fa-' + $('#select_icon').val() + '"> </i>');  
    });  
    $("#select_icon").change(function() {  
      var icono = $(this).val();  
        $("#icon_select").html('<i class="fa fa-2x fa-' + icono + '"> </i>');  
    });  
    </script>
    
    <script>
    $('#imageUpload').change(function(){      
      readImgUrlAndPreview(this);
      function readImgUrlAndPreview(input){
         if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {                    
                      $('#imagePreview').attr('src', e.target.result);
              }
                };
                reader.readAsDataURL(input.files[0]);
           }  
    });
    
    $('#imageUpload1').change(function(){      
      readImgUrlAndPreview(this);
      function readImgUrlAndPreview(input){
         if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {                    
                      $('#imagePreview1').attr('src', e.target.result);
              }
                };
                reader.readAsDataURL(input.files[0]);
           }  
    });
    
    $('#imageUpload2').change(function(){      
      readImgUrlAndPreview(this);
      function readImgUrlAndPreview(input){
         if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {                    
                      $('#imagePreview2').attr('src', e.target.result);
              }
                };
                reader.readAsDataURL(input.files[0]);
           }  
    });
    
    $('#imageUpload3').change(function(){      
      readImgUrlAndPreview(this);
      function readImgUrlAndPreview(input){
         if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {                    
                      $('#imagePreview3').attr('src', e.target.result);
              }
                };
                reader.readAsDataURL(input.files[0]);
           }  
    });
    
    $('#imageUpload4').change(function(){      
      readImgUrlAndPreview(this);
      function readImgUrlAndPreview(input){
         if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {                    
                      $('#imagePreview4').attr('src', e.target.result);
              }
                };
                reader.readAsDataURL(input.files[0]);
           }  
    });
</script>

  </body>
</html>