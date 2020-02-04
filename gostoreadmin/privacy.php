<?php include("controller/privacy.php");?>

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
                  <h4 class="card-title">App Privacy Policy</h4>
                      
                  <form action="" name="api_privacy_policy" method="post" class="form form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
                      <textarea name="app_privacy_policy" id="privacy_policy" class="form-control"><?php echo $settings_row['app_privacy_policy'];?></textarea>

                      <script>CKEDITOR.replace( 'app_privacy_policy' );</script>
					  </div>
					  
					  
					  <div class="form-group">
                    <button type="submit" name="app_pri_poly" class="btn btn-success col-md-12">Submit</button>
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
    </div>


     
        
<?php include("includes/footer.php");?>  