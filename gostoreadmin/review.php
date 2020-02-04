<?php include("controller/review.php");?>
<div class="content-wrapper">
          <div class="row">
		  
		  <div class="col-md-12 col-sm-12">
                <?php if(isset($_SESSION['msg'])){?> 
                 <div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <?php echo $client_lang[$_SESSION['msg']] ; ?></a> </div>
                <?php unset($_SESSION['msg']);}?> 
              </div>
               <?php
				$i=0;
				while($users_row=mysqli_fetch_array($users_result))
					{
				?>
				
                  <div class="col-md-3 grid-margin stretch-card">
							<div class="card text-center">
								<div class="card-body">
								
									<img src="<?php echo get_user_image($users_row['userid']);?>" alt="image" class="img-lg rounded-circle mb-2">
									<h4><?php echo get_user($users_row['userid']);?></h4>
									<h5 class="text-muted"><?php echo get_store($users_row['storeid']);?></55>
									
									<div class="text-center">                  
									<img src="asset/images/<?php if($users_row['rate']>=1){?>star.png<?php }else{?>star_e.png<?php }?>" style="height:20px;width:20px"> 
									<img src="asset/images/<?php if($users_row['rate']>=1.5){?>star.png<?php }else{?>star_e.png<?php }?>" style="height:20px;width:20px">
									<img src="asset/images/<?php if($users_row['rate']>=2.5){?>star.png<?php }else{?>star_e.png<?php }?>" style="height:20px;width:20px">
									<img src="asset/images/<?php if($users_row['rate']>=3.5){?>star.png<?php }else{?>star_e.png<?php }?>" style="height:20px;width:20px">
									<img src="asset/images/<?php if($users_row['rate']>=4.5){?>star.png<?php }else{?>star_e.png<?php }?>" style="height:20px;width:20px">
									</div>
				
									<p class="mt-4 card-text">
									<?php echo $users_row['review'];?>
									</p>
									<a href="review.php?id=<?php echo $users_row['id'];?>"
									onclick="return confirm('Are you sure you want to delete?');" class="btn btn-google">Delete</a>
									
									
								</div>
							</div>
						</div>
						<?php
						$i++;
						}
						?>
											
				  <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
                    <nav>
                <?php include("pagination.php");?>
            
                    </nav>
                  </div>
                </div>
             </div>
			 </div>
		 
 </div> 
		  
	  </div>
        <?php include("includes/footer.php");?> 