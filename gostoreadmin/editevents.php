<?php include("controller/editevents.php");?>
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
                  <h4 class="card-title"> Edit events</h4>
                  <form class="form form-horizontal" action="" method="post"  enctype="multipart/form-data" onsubmit="return editValidation(this);">
				  <input  type="hidden" name="eventid" value="<?php echo $_GET['eventid'];?>" />
				  <div class="form-group">
                        <label>Status</label>
                      <select class="form-control border-primary" name="status" id="status" required>
                        <option value="1" <?php if($row['status']=='1'){?>selected<?php }?>>Active</option>
                        <option value="0"<?php if($row['status']=='0'){?>selected<?php }?>>NonActive</option>
                    </select>
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Store</label>
                      <select class="form-control border-primary" name="storeid" id="storeid" required>
                        <?php
                            while($stores_row=mysqli_fetch_array($stores_result))
                            {
                        ?>                       
                        <option value="<?php echo $stores_row['storeid'];?>" <?php if($stores_row['storeid']==$row['storeid']){?>selected<?php }?>>
						<?php echo $stores_row['name'];?>
						</option>                           
                        <?php
                          }
                        ?>
                    </select></div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Event Name</label>
                     <input type="text" name="eventname" id="eventname" value="<?php echo $row['eventname'];?>" class="form-control" required>
                    </div>
					
					<div class="form-group row">
                      <div class="col">
                      <label for="exampleInputName1">Start</label>
                     <input type="date" name="datestart" id="datestart" value="<?php echo $row['datestart'];?>" class="form-control" required>
                    </div>
                      <div class="col">
                      <label for="exampleInputName1">End</label>
                     <input type="date" name="dateend" id="dateend" value="<?php echo $row['dateend'];?>" class="form-control" required>
                    </div>
                    </div>
					
					
					<div class="form-group">
                      <label for="exampleInputName1">Tags</label>
                     <input type="text" name="etags" id="etags" value="<?php echo $row['etags'];?>" class="form-control" required>
                    </div>
					
					<div class="form-group">
                
                  <label>Location</label>
                  <input type="text" class="form-control" name="eaddress" value="<?php echo $row['eaddress'];?>" id="us3-address" required />
              
              </div>

              <div class="form-group">
                  <div id="us3" style="width: 100%; height: 400px;"></div>
              </div>
				
				<div class="form-group row">
                      <div class="col">
                        <label>Latitude</label>
                        <input type="text" name="elatitude" id="us3-lat" value="<?php echo $row['elatitude'];?>" class="form-control" required>
                      </div>
                      <div class="col">
                        <label>Longitude</label>
                        <input type="text" name="elongitude" id="us3-lon" value="<?php echo $row['elongitude'];?>" class="form-control" required>
                      </div>
                    </div>
					
			  <div class="form-group">
                      <label for="exampleInputName1">Description</label>
                      <textarea name="edescription" id="edescription" class="form-control" required><?php echo $row['edescription'];?></textarea>
					  </div>
				
                 
				  
				  <div class="form-group">
                      <label>Image</label>
					  
                      <div class="input-group col-xs-12">
                        <input type="file" name="eimage" id="fileupload">
                      </div>
                    </div>
					
					<div class="form-group">
                    <label class="col-xs-12 control-label">&nbsp; </label>
                    <div class="col-md-12">
                        <?php if($row['eimage']) {?>
                              <div class="images"><img src="images/events/<?php echo $row['eimage'];?>" width="100%" /></div>
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
                    latitude: <?php echo $row['elatitude'];?>,
                    longitude: <?php echo $row['elongitude'];?>
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
