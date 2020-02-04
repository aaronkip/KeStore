<?php include("controller/app_settings.php");?>
 
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
                  <h4 class="card-title">App Settings</h4>
                      
                  <form action="" name="settings_from" method="post" class="form form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
                      <label for="exampleInputName1">Author</label>
                     <input type="text" name="app_author" id="app_author" value="<?php echo $settings_row['app_author'];?>" class="form-control">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Contact</label>
                     <input type="text" name="app_contact" id="app_contact" value="<?php echo $settings_row['app_contact'];?>" class="form-control">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Email</label>
                     <input type="text" name="app_email" id="app_email" value="<?php echo $settings_row['app_email'];?>" class="form-control">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Website</label>
                     <input type="text" name="app_website" id="app_website" value="<?php echo $settings_row['app_website'];?>" class="form-control">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">App Version</label>
                     <input type="text" name="app_version" id="app_version" value="<?php echo $settings_row['app_version'];?>" class="form-control">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Ghipy Api</label>
                     <input type="text" name="ghipy_api" id="ghipy_api" value="<?php echo $settings_row['ghipy_api'];?>" class="form-control">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Description</label>
                      <textarea name="app_description" id="app_description" class="form-control"><?php echo $settings_row['app_description'];?></textarea>

                      <script>CKEDITOR.replace( 'app_description' );</script>
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
