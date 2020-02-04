<?php
								// Initial page num setup
	if ($page == 0){$page = 1;}
	$prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;					
	
	
	$paginate = '';
	if($lastpage > 1)
	{	
	

	
	
		$paginate .= "<ul class='pagination pagination-info mb-0'>";
		// Previous
		if ($page > 1){
			$paginate.= "<li class='page-item'><a href='$target_page?page=$prev' class='page-link'><i class='mdi mdi-chevron-left'></i></a></li>";
		}else{
			$paginate.= "<li class='page-item'><a class='page-link'><i class='mdi mdi-chevron-left'></i></a></li>";	}
			

		
		// Pages	
		if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page){
					$paginate.= "<li class='page-item active'><a class='page-link'>$counter</a></li>";
				}else{
					$paginate.= "<li class='page-item'><a href='$target_page?page=$counter' class='page-link'>$counter</a></li>";}
				
			}
		}
		elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
		{
			// Beginning only hide later pages
			if($page < 1 + ($stages * 2))		
			{
				for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
				{
					if ($counter == $page){
						$paginate.= "<li class='active'><span class='active'>$counter</span></li>";
					}else{
						$paginate.= "<li><a href='$target_page?page=$counter'>$counter</a></li>";}					
				}
				$paginate.= "<li>...</li>";
				$paginate.= "<li><a href='$target_page?page=$LastPagem1'>$LastPagem1</a></li>";
				$paginate.= "<li><a href='$target_page?page=$lastpage'>$lastpage</a></li>";		
			}
			// Middle hide some front and some back
			elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
			{
				$paginate.= "<li><a href='$target_page?page=1'>1</a></li>";
				$paginate.= "<li><a href='$target_page?page=2'>2</a></li>";
				$paginate.= "<li>...</li>";
				for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<li class='active'><span class='active'>$counter</span></li>";
					}else{
						$paginate.= "<li><a href='$target_page?page=$counter'>$counter</a></li>";}					
				}
				$paginate.= "<li>...</li>";
				$paginate.= "<li><a href='$target_page?page=$LastPagem1'>$LastPagem1</a></li>";
				$paginate.= "<li><a href='$target_page?page=$lastpage'>$lastpage</a></li>";		
			}
			// End only hide early pages
			else
			{
				$paginate.= "<li><a href='$target_page?page=1'>1</a></li>";
				$paginate.= "<li><a href='$target_page?page=2'>2</a></li>";
				$paginate.= "<li>...</li>";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<li class='active'><span class='active'>$counter</span></li>";
					}else{
						$paginate.= "<li><a href='$target_page?page=$counter'>$counter</a></li>";}					
				}
			}
		}
					
				// Next
		if ($page < $counter - 1){ 
			$paginate.= "<li class='page-item'><a href='$target_page?page=$next' class='page-link'><i class='mdi mdi-chevron-right'></i></a></li>";
		}else{
			$paginate.= "<li class='page-item'><a class='page-link'><i class='mdi mdi-chevron-right'></i></a></li>";
			}
			
		$paginate.= "</ul>";		
	
	
}
  
 // pagination
 echo $paginate;
								?>