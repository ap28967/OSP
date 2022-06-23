<?php 
 
$name_page = "Absensi Senam";
include("../header/navbar.php");
if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
}





$session_id_group = $_SESSION['osp_grp']; // GANTI PAKE SESSION
$query = "SELECT * FROM view_senam WHERE grp = '$session_id_group'";

// $query_checked = $query ." GROUP BY status";
$query_all = $query ." ORDER BY npk_anggota ASC";
$query_checked = $query ." AND `status_senam` = 1 ";

$results_all = mysqli_query($link_osp, $query_all) or die (mysqli_error($link_osp));
$results_checked = mysqli_query($link_osp, $query_checked) or die (mysqli_error($link_osp));

$total_mp = mysqli_num_rows($results_all);
$total_checked = mysqli_num_rows($results_checked);
?>




                <div class="row">
                    <div class="col-md-12">  
                        <div class="card">


                        <form type="post" action="" id="form">
                            <div class="card-header">
                                <h4>Absensi Senam :<span id="notifikasi" style="color:black;">&nbsp;<?php echo $total_checked; echo " / "; echo $total_mp; ?></span></h4>
                                
                                <div class="card-header-action">
                                    <div class="btn-group">
                                        <button type="button" id="checkAll" name="checkAll" class="btn btn-danger">Select All</button>
                                        <button type="button" id="clearAll" name="clearAll" class="btn btn-danger">Clear All</button>
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>

                       
                            <!-- LIST MP 24189   1-001-001-012-048-->                            
                            <div class="card-body row col-md-12">
                                
                                <?php                                
                                while ($rows_all = mysqli_fetch_assoc($results_all)){
                                $npk_anggota =  $rows_all['npk_anggota'];
                                $nama_depan_anggota = $rows_all['nama_depan_anggota'];
                                $status_senam = $rows_all['status_senam'];
                                ?>

                                <div class="card-body col-md-3">
                                    <label class="kotak truncate ">
                                        <input type="checkbox" class="check" name="checkbox[]" value="<?php echo $npk_anggota?>"  <?php if($status_senam>0){echo 'checked';}?>>
                                        <span class="checkmark truncate">
                                            <?php   echo $npk_anggota;
                                                    echo " : ";                                                    
                                                    echo $nama_depan_anggota;
                                            ?>
                                        </span>
                                    </label>
                                </div>
                                
                                <?php
                                }
                                ?>
                            </div>

                        </form>
                        <!-- <div class="" id="notifikasi"></div> -->
                        
                        
                        <!-- Card -->
                        </div>
                    <!-- Col -->
                    </div>
                <!-- Row -->
                </div>




<?php
  include("../header/footer.php");
?>



<!-- General JS Scripts -->
<script src="../../ASSETS/bootstrap/js/jquery-3.3.1.min.js" ></script>
<script src="../../ASSETS/bootstrap/js/popper.min.js"></script>
<script src="../../ASSETS/bootstrap/js/bootstrap.min.js"></script>
<script src="../../ASSETS/bootstrap/js/jquery.nicescroll.min.js"></script>
<script src="../../ASSETS/bootstrap/js/moment.min.js"></script>
<script src="../../ASSETS/js/stisla.js"></script>
<!-- JS Libraies -->
<script src="../../ASSETS/bootstrap/js/jquery.sparkline.min.js"></script>
<script src="../../ASSETS/bootstrap/js/owl.carousel.min.js"></script>
<script src="../../ASSETS/bootstrap/js/jquery.chocolat.min.js"></script>
<!-- Template JS File -->
<script src="../../ASSETS/js/scripts.js"></script>
<script src="../../ASSETS/bootstrap/js/chart.min.js"></script>
<script src="../../ASSETS/js/custom.js"></script>
<!-- Page Specific JS File -->
<script src="../../ASSETS/js/page/index.js"></script>




<!-- Button Check All -->
<script>
    $(document).ready(function(){
        $(document).on('click', '#checkAll', function() {            
                $('.check').each(function() {
                    this.checked = true;
                })            
        });
        $(document).on('click', '#clearAll', function() {         
                $('.check').each(function() {
                    this.checked = false;
                })    
        });
    })
</script>


<!-- Kirim Data ke File Proses PHP -->
<script type="text/javascript">
  	$(document).ready(function() {

  		$("#submit").on("click", function(e) {
            e.preventDefault()
  			var $this 		    = $(this); //submit button selector using ID
	        var $caption        = $this.html();// We store the html content of the submit button
	        var form 			= "#form"; //defined the #form ID
	        var formData        = $(form).serialize(); //serialize the form into array
	        // var route 			= $(form).attr('action'); //get the route using attribute action

	        // Ajax config
	    	$.ajax({
		        type: "POST", //we are using POST method to submit the data to the server side
		        url: "senam_absensi_post.php", // get the route value
		        data: formData, // our serialized array data for server side
		        beforeSend: function () {//We add this before send to disable the button once we submit it so that we prevent the multiple click
		            $this.attr('disabled', true).html("Processing...");
		        },
		        success: function (response) {
                    $('#notifikasi').html(response);
		        },
		        complete: function() {
		        	$this.attr('disabled', false).html($caption);
		        },
		        error: function (XMLHttpRequest, textStatus, errorThrown) {
		        	// You can put something here if there is an error from submitted request
		        }
		    });
  		});
  		
  	});
  </script>