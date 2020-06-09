<!-- App js -->
        <script src="assets/plugins/custombox/js/custombox.min.js"></script>
        <script src="assets/plugins/custombox/js/legacy.min.js"></script>
        
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script src="assets/js/advertisement.js"></script>


         <!-- Required datatable js -->
         <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>

        <!-- Key Tables -->
        <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Selection table -->
        <script src="assets/plugins/datatables/dataTables.select.min.js"></script>

        <script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>

        <script>
            var hour=0;
            var min=0;
            var sec = 60;

            $(document).ready(function() {
                hour = $('span.hour').html();
                min = $('span.min').html();

                var todayDate = new Date();
                var dd = String(todayDate.getDate()).padStart(2, '0');
                var mm = String(todayDate.getMonth() + 1).padStart(2, '0');
                var yyyy = todayDate.getFullYear();
                todayDate = yyyy + '-' + mm + '-' + dd;
                $(".maxDateToday").max = todayDate;

                $(".select2").select2();
                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

       

        // function getDepartmentClients(depId) {
        //     if(depId != "") {
        //         $.post("action.php", {
        //             task:'<?php echo base64_encode('P_CLIENT'); ?>',
        //             subtask:'<?php echo base64_encode('GET_CLIENTS'); ?>',
        //             dep_id:depId
        //         },function(resp){
        //             var obj = JSON.parse(resp);
        //             var data = obj.data;
        //                 var client = $('#client');
        //                 client.html('');
        //                 client.append(
        //                     $('<option></option>').val('').html('Select Client')
        //                 );

        //                 $.each(data, function(val, clientInfo) {                         
        //                     client.append(
        //                         $('<option></option>').val(clientInfo.id).html(clientInfo.client_name)
        //                     );
        //                 }); 
        //         });
        //     }
        // }
        </script>

    </body>
</html>