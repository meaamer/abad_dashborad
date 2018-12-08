
 
	

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
							
				<div class="row">
						<div class="col-xl-12">
								<div class="breadcrumb-holder">
										<h1 class="main-title float-left">Area List</h1>
										<ol class="breadcrumb float-right">
											<li class="breadcrumb-item">Home</li>
											<li class="breadcrumb-item active">Area</li>
										</ol>
										<div class="clearfix"></div>
								</div>
						</div>
				</div>
				<!-- end row -->

				


				
				<div class="row">
				
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
							<div class="card mb-3">
								<div class="card-header">
									<h3><i class="fa fa-table"></i> Area</h3>
								
								</div>
									
								<div class="card-body">
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												<th>ID</th>
												<th>Area Name</th>
												
												<th>Action</th>
                                                
                                               
												
											</tr>
										</thead>										
										<tbody>
											<?php foreach ($areas as $category): ?>
												
												<tr id="reload<?php echo $category['area_id']; ?>">
												<td><?php echo $category['area_id']; ?></td>
												<td><?php echo $category['area_name']; ?></td>
												
												
												<td>

													<a href="<?php echo base_url('Area/areaList/').$category['area_id']; ?>" class="btn btn-info btn-fill">
                                                    <i class="fa fa-fw fa-pencil"></i></a>

                                                <button type="button" class="btn btn-danger btn-fill"
                                                 onclick="deleteArea(<?php echo $category['area_id']; ?>);">
                                                    <i class="fa fa-fw fa-trash"></i></button>
												</td>
											</tr>

											<?php endforeach ?>
                                                
                                                
											
										</tbody>
									</table>
									</div>
									
								</div>														
							</div><!-- end card-->					
						</div>
						
						

				</div>




						
			


            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	
	
    <script>
    // START CODE FOR BASIC DATA TABLE 
    $(document).ready(function() {
        $('#example1').DataTable();
    } );
    // END CODE FOR BASIC DATA TABLE 

    function deleteArea(id)
{

    alertify.confirm("confirm","Sure You Want To Delete This.",function(){
    $.ajax({
    type:"POST",
    url:"<?php echo base_url()?>Area/deleteArea/"+id,
    success: function(response)
    {
      alertify.success(response);
      $('#reload'+id).remove();
    }
  });
  },
  function(){
    alertify.error('Cancel');
  });
}
    
    </script>   
    







 
        
        
        
            
