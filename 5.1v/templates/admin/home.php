<?php 
    include_once 'inc/header.php';
    include_once 'inc/menu.php';
?>

<!-- Body section -->

        <div id="c_main">
            
            <div class="page_header">
                <div class="row">
                    <div class="col-md-10"><h3>Pagrindinis</h3></div>
                </div>
            </div>        
            
            <div class="page_content">
                <div class="row">
                    <div class="col-md-14">
                        <div style="margin:20px 0" class="date_selector" id="">
                                <div style="display:inline-block;padding:5px;font-weight:bold;"><a id="users" style="text-decoration:none;" href="javascript:void(0);" onclick="users(this);">Vartotojai</a></div>
                                <div style="display:inline-block;padding:5px;font-weight:bold;"><a id="marks" style="text-decoration:none;" href="javascript:void(0);" onclick="marks(this);">Pažymiai</a></div>
                                <div style="display:inline-block;padding:5px;font-weight:bold;"><a id="subjects" style="text-decoration:none;" href="javascript:void(0);" onclick="subjects(this);">Dalykai</a></div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-14" style="position:relative;" id="admin_content">

                    </div>
                </div>
            </div>
        </div>
        
        <!-- Loading scripts -->
        <script>
            $(document).ready(function(){
                let id = document.getElementById('users');
                users(id);
            })
        </script>

<?php include_once 'inc/footer.php';?>

