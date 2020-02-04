<?php include("controller/addoffers.php");?>
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
                  <h4 class="card-title"> Edit offers</h4>
                  <form class="form form-horizontal" action="" method="post"  enctype="multipart/form-data" onsubmit="return editValidation(this);">
				  <input  type="hidden" name="offerid"/>
				  <div class="form-group">
                        <label>Status</label>
                      <select class="form-control border-primary" name="status" id="status" required>
                        <option value="1">Active</option>
                        <option value="0">NonActive</option>
                    </select>
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Store</label>
                      <select class="form-control border-primary" name="storeid" id="storeid" required>
                      <option>User</option>
                        <?php
                            while($stores_row=mysqli_fetch_array($stores_result))
                            {
                        ?>                       
                        <option value="<?php echo $stores_row['storeid'];?>">
						<?php echo $stores_row['name'];?>
						</option>                           
                        <?php
                          }
                        ?>
                    </select></div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Offer Name</label>
                     <input type="text" name="offersname" id="offersname" class="form-control" required>
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputName1">Price</label>
                     <input type="text" name="price" id="price" class="form-control" required>
                    </div>
					
					<div class="form-group row">
                      <div class="col">
                      <label for="exampleInputName1">Start</label>
                     <input type="date" name="datestart" id="datestart" class="form-control" required>
                    </div>
                      <div class="col">
                      <label for="exampleInputName1">End</label>
                     <input type="date" name="dateend" id="dateend" class="form-control" required>
                    </div>
                    </div>
					
					
					<div class="form-group">
                      <label for="exampleInputName1">Tags</label>
                     <input type="text" name="otags" id="otags" class="form-control" required>
                    </div>
					
					<div class="form-group">
                
                  <label>Location</label>
                  <input type="text" class="form-control" name="oaddress" id="us3-address" required />
              
              </div>

              <div class="form-group">
                  <div id="us3" style="width: 100%; height: 400px;"></div>
              </div>
				
				<div class="form-group row">
                      <div class="col">
                        <label>Latitude</label>
                        <input type="text" name="olatitude" id="us3-lat" class="form-control">
                      </div>
                      <div class="col">
                        <label>Longitude</label>
                        <input type="text" name="olongitude" id="us3-lon" class="form-control">
                      </div>
                    </div>
					
			  <div class="form-group">
                      <label for="exampleInputName1">Description</label>
                      <textarea name="odescription" id="odescription" class="form-control" required></textarea>
					  </div>
				
                 
				  
				  <div class="form-group">
                      <label>Image</label>
					  
                      <div class="input-group col-xs-12">
                        <input type="file" name="image" id="fileupload" required>
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
                    latitude: -6.222320699570134,
                    longitude: 106.83289668750001
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
