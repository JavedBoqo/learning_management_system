<!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <?php echo date('l jS \of F Y h:i:s A');?>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script type="text/javascript">
            function setDeleteId(id) {
                $('#delId').val(id);   
            }
            function deleteRecord(task,subTask) {
                var delId = $('#delId').val();
                var otherData = $('#otherData').val();
                $.post('action.php',{ 
                    task : task, 
                    subtask : subTask, 
                    id: delId,
                    otherData:otherData
                    },function(response){
                    $('.btn-action').hide();
                    var resp = jQuery.parseJSON(response);
                    if(resp.status) {                        
                        $('div.result').html('<div class="alert alert-success">'+resp.message+'</div>');
                        setTimeout(function(){
                            window.location=resp.redirectURL;
                        },2000);
                    }else {
                        $('div.result').html('<div class="alert alert-danger">'+resp.message+'</div>');
                        $('.btn-action').show();
                    }
                });
            } 

            function ShowForm() {
                $('div.form').show();
                $('div.list').hide();
            }
            function HideForm() {
                $('div.form').hide();
                $('div.list').show();
                <?php if($id > 0){?>
                    window.history.back();
                <?php } ?>
            }
        </script>