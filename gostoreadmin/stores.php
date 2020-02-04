<?php include("controller/stores.php");?>
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
                      <h4 class="card-title">Add stores</h4>
					  
					<a href="addstores.php?add=yes"><button type="button" class="btn btn-success col-md-12"><strong>Add stores</strong></button></a>
				
                  </div>
                </div>
		 </div>
			<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                      <h4 class="card-title">stores</h4>					  
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
				  <th>Address</th>
				  <th>City</th>
				  <th>Category</th>
				  <th>Open Hours</th>
				  <th>Featured</th>	
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
				   <td><img class="card-img-top" src="images/stores/<?php echo $users_row['images'];?>" onerror="this.onerror=null;this.src='<?php echo BASE_URL; ?>asset/images/users.png';" alt="Card image cap"></td>
                   <td><?php echo $users_row['name'];?></td>
		           <td><?php echo $users_row['address'];?></td>   
		           <td><?php echo $users_row['cityname'];?></td>
				   <td><?php echo $users_row['cname'];?></td>
				   <td><?php echo $users_row['open'];?> - <?php echo $users_row['closed'];?></td>
				   <td>
				   <?php if($users_row['featured']!="0"){?>
                      <a href="stores.php?featurednonactive=<?php echo $users_row['storeid'];?>" data-toggle="tooltip" data-tooltip="ENABLE"><button type="button" class="badge badge-outline-success">Active</button></a></a>

                      <?php }else{?>
                      
                      <a href="stores.php?featuredactive=<?php echo $users_row['storeid'];?>" data-toggle="tooltip" data-tooltip="ENABLE"><button type="button" class="badge badge-outline-danger">nonActive</button></a></a>

                      <?php }?>
				   </td>
				   <td>
				   <?php if($users_row['status']!="0"){?>
                      <a href="stores.php?nonactive=<?php echo $users_row['storeid'];?>" data-toggle="tooltip" data-tooltip="ENABLE"><button type="button" class="badge badge-outline-success">Active</button></a></a>

                      <?php }else{?>
                      
                      <a href="stores.php?active=<?php echo $users_row['storeid'];?>" data-toggle="tooltip" data-tooltip="ENABLE"><button type="button" class="badge badge-outline-danger">nonActive</button></a></a>

                      <?php }?>
				   </td>
					<td>
					<a href="editstores.php?storeid=<?php echo $users_row['storeid'];?>" class="btn btn-primary">Edit</a>
					<a href="stores.php?storeid=<?php echo $users_row['storeid'];?>" onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-google">Delete</a></td>
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