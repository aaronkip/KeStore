<?php include("controller/editstores.php");?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places">
    </script>
	
	<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyCc6f-P5mqAhjKsca2KZefZRucUdq2xNgY&sensor=false&libraries=places'></script>
	<script src="asset/js/locationpicker.jquery.js"></script>
 
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
                  <h4 class="card-title"> Edit Stores</h4>
                  <form class="form form-horizontal" action="" method="post"  enctype="multipart/form-data" onsubmit="return editValidation(this);">
				  <input  type="hidden" name="storeid" value="<?php echo $_GET['storeid'];?>" />
				  <div class="form-group row">
                      <div class="col">
                        <label>Status</label>
                      <select class="form-control border-primary" name="status" id="status" required>
                        <option value="1" <?php if($row['status']=='1'){?>selected<?php }?>>Active</option>
                        <option value="0" <?php if($row['status']=='0'){?>selected<?php }?>>NonActive</option>
                    </select>
                      </div>
                      <div class="col">
                        <label>Featured</label>
                        <select class="form-control border-primary" name="featured" id="featured" required>
                        <option value="1" <?php if($row['featured']=='1'){?>selected<?php }?>>Active</option>
                        <option value="0" <?php if($row['featured']=='0'){?>selected<?php }?>>NonActive</option>
                    </select>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Property Name</label>
                     <input type="text" name="name" id="name" value="<?php echo $row['name'];?>" class="form-control" required>
                    </div>
					
					<div class="form-group row">
                      <div class="col">
                      <label for="exampleInputName1">Open Time</label>
                     <input type="time" name="open" id="open" value="<?php echo $row['open'];?>" class="form-control" required>
                    </div>
                      <div class="col">
                      <label for="exampleInputName1">Closed Time</label>
                     <input type="time" name="closed" id="closed" value="<?php echo $row['closed'];?>" class="form-control" required>
                    </div>
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">User</label>
                      <select class="form-control border-primary" name="userid" id="userid" required>
                      <option value="">User</option>
                        <?php
                            while($user_row=mysqli_fetch_array($user_result))
                            {
                        ?>                       
                        <option value="<?php echo $user_row['userid'];?>" <?php if($user_row['userid']==$row['userid']){?>selected<?php }?>>
						<?php echo $user_row['fullname'];?>
						</option>                           
                        <?php
                          }
                        ?>
                    </select></div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Select Category</label>
                      <select class="form-control border-primary" name="cid" id="cid" required>
                      <option value="">Select Category</option>
                        <?php
                            while($cat_row=mysqli_fetch_array($cat_result))
                            {
                        ?>                       
                        <option value="<?php echo $cat_row['cid'];?>" <?php if($cat_row['cid']==$row['cid']){?>selected<?php }?>>
						<?php echo $cat_row['cname'];?>
						</option>                           
                        <?php
                          }
                        ?>
                    </select></div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Select City</label>
                      <select class="form-control border-primary" name="cityid" id="cityid" required>
                      <option value="">Select City</option>
                        <?php
                            while($city_row=mysqli_fetch_array($city_result))
                            {
                        ?>                       
                        <option value="<?php echo $city_row['cityid'];?>" <?php if($city_row['cityid']==$row['cityid']){?>selected<?php }?>>
						<?php echo $city_row['cityname'];?></option>                           
                        <?php
                          }
                        ?>
                    </select></div>
					
					
					<div class="form-group">
                      <label for="exampleInputName1">Tags</label>
                     <input type="text" name="tags" id="tags" value="<?php echo $row['tags'];?>" class="form-control" required>
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Phone</label>
                     <input type="text" name="phone" id="phone" value="<?php echo $row['phone'];?>" class="form-control" required>
                    </div>
					
					<div class="form-group">
                
                  <label>Location</label>
                  <input type="text" class="form-control" name="address" id="us3-address" value="<?php echo $row['address'];?>" />
              
              </div>

              <div class="form-group">
                  <div id="us3" style="width: 100%; height: 400px;"></div>
              </div>
				
				<div class="form-group row">
                      <div class="col">
                        <label>Latitude</label>
                        <input type="text" name="latitude" id="us3-lat"  value="<?php echo $row['latitude'];?>" class="form-control">
                      </div>
                      <div class="col">
                        <label>Longitude</label>
                        <input type="text" name="longitude" id="us3-lon" value="<?php echo $row['longitude'];?>" class="form-control">
                      </div>
                    </div>
					
			  <div class="form-group">
                      <label for="exampleInputName1">Description</label>
                      <textarea name="description" id="description" class="form-control" required><?php echo $row['description'];?></textarea>
					  </div>
				
                 
				  
				  <div class="form-group">
                      <label>Image</label>
					  
                      <div class="input-group col-xs-12">
                        <input type="file" name="images" id="fileupload">
                      </div>
                    </div>
					
					<div class="form-group">
                    <label class="col-xs-12 control-label">&nbsp; </label>
                    <div class="col-md-12">
                        <?php if($row['images']) {?>
                              <div class="images"><img src="images/stores/<?php echo $row['images'];?>" width="100%" /></div>
                        <?php }else{ ?>
                        	<div class="images"> <img type="images" src="assets/images/add-image.png" width="100%" alt="category image" /> </div>
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

      </div>
    </div>            
        <script>
            $('#us3').locationpicker({
                location: {
                    latitude: <?php echo $row['latitude'];?>,
                    longitude: <?php echo $row['longitude'];?>
                },
                radius: 300,
                inputBinding: {
                    latitudeInput: $('#us3-lat'),
                    longitudeInput: $('#us3-lon'),
                    radiusInput: $('#us3-radius'),
                    locationNameInput: $('#us3-address')
                },
                enableAutocomplete: true,
                onchanged: function (currentLocation, radius, isMarkerDropped) {
					}
            });
        </script>       
        
<?php include("includes/footer.php");?>      
