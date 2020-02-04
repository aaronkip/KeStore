<?php include("controller/send_notification.php");?>

<div class="content-wrapper">
          <div class="row">
		  <div class="card-body">
          <div class="row">
            <div class="col-md-12">
               
              <div class="col-md-12 col-sm-12">
                <?php if(isset($_SESSION['msg'])){?> 
               	 <div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                	<?php echo $client_lang[$_SESSION['msg']] ; ?></a> </div>
                <?php unset($_SESSION['msg']);}?>	
              </div>
            </div>
          </div>
            <div class="col-md-12 grid-margin stretch-card">
		
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Send Notification</h4>
                  <form action="" name="addeditcategory" method="post" class="form form-horizontal" enctype="multipart/form-data">
            	<div class="form-group">
                      <label for="exampleInputName1">Title</label>
                     <input type="text" name="notification_title" id="notification_title" class="form-control" required>
                    </div>
					
					
					<div class="form-group">
                      <label for="exampleInputName1">Message</label>
                     <textarea name="notification_msg" id="notification_msg" class="form-control" required></textarea>
                    </div>
					
					
				  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-success col-md-12">Submit</button>
					</div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>  

</div>

	 
      </div>
    </div>


     
        
<?php include("includes/footer.php");?>  		
