

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
							
				<div class="row">
						<div class="col-xl-12">
								<div class="breadcrumb-holder">
										<h1 class="main-title float-left">Business Tables</h1>
										<ol class="breadcrumb float-right">
											<li class="breadcrumb-item">Home</li>
											<li class="breadcrumb-item active">List</li>
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
									<h3><i class="fa fa-table"></i> Business List</h3>
									
								</div>
									
								<div class="card-body">
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												<th>#ID</th>
												<th>NAME</th>
												<th>MOBILE NO</th>
												<th>REGISTER DATE</th>
                                                <th>CATEGORY</th>
                                                <th>AREA</th>
												<th>UPDATE</th>
												
											</tr>
										</thead>										
										
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
	<!-- END content-page -->
   

	<script>
	// START CODE FOR BASIC DATA TABLE 
	// $(document).ready(function() {
	// 	$('#example1').DataTable();
	// } );
	// END CODE FOR BASIC DATA TABLE 
	
	</script>

    <script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      var dataTable = $('#example1').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Registration/fetch_user/0'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[6],  
                     "orderable":false,  
                },  
           ],  
      });  
 });  
 </script>  	
    
    
        
        
        
<!-- END Java Script for this page -->

</body>
</html>