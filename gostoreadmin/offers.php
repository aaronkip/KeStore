<?php include("controller/offers.php");?>
<div class="content-wrapper">
          <div class="row">
		  
		  <div class="col-md-12 col-sm-12">
                <?php if(isset($_SESSION['msg'])){?> 
                 <div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <?php echo $client_lang[$_SESSION['msg']] ; ?></a> </div>
                <?php unset($_SESSION['msg']);}?> 
              </div>
		  <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body avatar">
                      <h4 class="card-title">Add Offers</h4>
					  
					<a href="addoffers.php?add=yes"><button type="button" class="btn btn-success col-md-12"><strong>Add Offers</strong></button></a>
				
                  </div>
                </div>
		 </div>
			<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                      <h4 class="card-title">Offers</h4>					  
                      <form  method="post" action="">
                      <div class="input-group col-xs-12">
                        <input class="form-control input-sm" placeholder="Search..." aria-controls="DataTables_Table_0" type="search" name="search_value" required>
                        
                        <div class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="submit" name="user_search">Search</button>                          
                        </div>
                      </div>
					  </form>
               
				
                  <div class=" text-center table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
				  <th>Image</th>
                  <th>Name</th>				  
				  <th>Price</th>
				  <th>Address</th>
				  <th>Start</th>
				  <th>End</th>	
				  <th>Status</th>				  
                  <th>Action</th>
                </tr>
                      </thead>
                      <tbody>
                        <?php
						$i=0;
						while($users_row=mysqli_fetch_array($users_result))
						{
						 
				?>
                <tr>
				   <td><img class="card-img-top" src="images/offers/<?php echo $users_row['image'];?>" onerror="this.onerror=null;this.src='<?php echo BASE_URL; ?>asset/images/users.png';" alt="Card image cap"></td>
                   <td>
				   <?php echo $users_row['offersname'];?>
				   </td>   
		           <td>$<?php echo $users_row['price'];?></td>
		           <td><?php echo $users_row['oaddress'];?></td>
				   <td><?php echo $users_row['datestart'];?></td>
				   <td><?php echo $users_row['dateend'];?></td>
				   <td>
				   <?php if($users_row['status']!="0"){?>
                      <a href="offers.php?nonactive=<?php echo $users_row['offerid'];?>" data-toggle="tooltip" data-tooltip="ENABLE"><button type="button" class="badge badge-outline-success">Active</button></a></a>

                      <?php }else{?>
                      
                      <a href="offers.php?active=<?php echo $users_row['offerid'];?>" data-toggle="tooltip" data-tooltip="ENABLE"><button type="button" class="badge badge-outline-danger">nonActive</button></a></a>

                      <?php }?>
				   </td>
					<td>
					<a href="editoffers.php?offerid=<?php echo $users_row['offerid'];?>" class="btn btn-primary">Edit</a>
					<a href="offers.php?offerid=<?php echo $users_row['offerid'];?>" onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-google">Delete</a></td>
                </tr>
               <?php
						
						$i++;
						}
			   ?>
                      </tbody>
					  
                    </table>
								
                  </div>
				  <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
                    <nav>
                <?php if(!isset($_POST["user_search"])){ include("pagination.php");}?>
            
                    </nav>
                  </div>
                </div>
             </div>
			 </div>
		 
 </div> 
		  
	  </div>
        <?php include("includes/footer.php");?> 