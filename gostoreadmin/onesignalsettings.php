<?php include("controller/onesignalsettings.php");?>
 
 <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
               
              <div class="col-md-12 col-sm-12">
                <?php if(isset($_SESSION['msg'])){?> 
               	 <div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                	<?php echo $client_lang[$_SESSION['msg']] ; ?></a> </div>
                <?php unset($_SESSION['msg']);}?>	
              </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Onesignal Settings</h4>
                      
                  <form action="" name="settings_onesignal" method="post" class="form form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
                      <label for="exampleInputName1">Onesignal App Id</label>
                     <input type="text" name="onesignal_app_id" id="onesignal_app_id" value="<?php echo $settings_row['onesignal_app_id'];?>" class="form-control">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Onesignal Rest Key</label>
                     <input type="text" name="onesignal_rest_key" id="onesignal_rest_key" value="<?php echo $settings_row['onesignal_rest_key'];?>" class="form-control">
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


     
        
<?php include("includes/footer.php");?>       
