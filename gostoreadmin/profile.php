<?php include("controller/profile.php");?>
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
                  <h4 class="card-title">Edit Profile</h4>
                  <form action="" name="editprofile" method="post" class="form form-horizontal" enctype="multipart/form-data">
            	<div class="form-group">
                      <label for="exampleInputName1">Username</label>
                     <input type="text" name="username" id="username" value="<?php echo $row['username'];?>" class="form-control" required autocomplete="off">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Password</label>
                     <input type="password" name="password" id="password" value="<?php echo $row['password'];?>" class="form-control" required autocomplete="off">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Email</label>
                     <input type="text" name="email" id="email" value="<?php echo $row['email'];?>" class="form-control" required autocomplete="off">
                    </div>
					
					<div class="form-group">
                      <label>File upload</label>
					  
                      <div class="input-group col-xs-12">
                        <input type="file" name="image" id="fileupload">
                      </div>
                    </div>
					
					<div class="form-group">
                    <label class="col-xs-12 control-label">&nbsp; </label>
                    <div class="col-md-12">
                        <?php if($row['image']!="") {?>
                        	  <div class="image"><img type="image" src="asset/images/<?php echo $row['image'];?>" alt="profile image" /></div>
                        	<?php } else {?>
                        	  <div class="image"><img type="image" src="asset/images/profile.png" alt="add image" /></div>
                        	<?php }?>
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

        
<?php include("includes/footer.php");?>       
