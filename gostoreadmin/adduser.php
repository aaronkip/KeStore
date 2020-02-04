<?php include("controller/adduser.php");?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
 
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
                  <h4 class="card-title"> Edit User</h4>
                  <form class="form form-horizontal" action="" method="post"  enctype="multipart/form-data" onsubmit="return editValidation(this);">
				  <input  type="hidden" name="userid" />
				 
					
					<div class="form-group">
                      <label for="exampleInputName1">Name</label>
                     <input type="text" name="fullname" id="fullname"  class="form-control" required>
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Phone</label>
                     <input type="text" name="userid" id="userid" class="form-control" required>
                    </div>
					
					<div class="form-group">
                      <label>File upload</label>
					  
                      <div class="input-group col-xs-12">
                        <input type="file" name="imageprofile" id="fileupload" required>
                      </div>
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
