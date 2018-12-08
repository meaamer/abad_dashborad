

<!-- BEGIN CSS for this page -->
		<style>
		.parsley-error {
			border-color: #ff5d48 !important;
		}
		.parsley-errors-list.filled {
			display: block;
		}
		.parsley-errors-list {
			display: none;
			margin: 0;
			padding: 0;
		}
		.parsley-errors-list > li {
			font-size: 12px;
			list-style: none;
			color: #ff5d48;
			margin-top: 5px;
		}
		.form-section {
			padding-left: 15px;
			border-left: 2px solid #FF851B;
			display: none;
		}
		.form-section.current {
			display: inherit;
		}
		</style>
		<!-- END CSS for this page -->
	
    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">


			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Main Category</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Category</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->
			

			

			
			<div class="row">
			
                    <div class="col-md-2">						
										
                    </div>

					
					
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> New Category</h3>
								
							</div>
								
							<div class="card-body">
								

								<form id="new_category" data-parsley-validate novalidate>
                                                    <div class="form-group">
                                                        <label for="userName">Category Name<span class="text-danger">*</span></label>
                                                        <input type="text" name="category_name" data-parsley-trigger="change" required placeholder="Name of Category" class="form-control"
                                                        value="<?php if( isset($rows) ){echo $rows['category_name'];} ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="userName">Category Description<span class="text-danger">*</span></label>
                                                        <textarea class="form-control" name="category_desc"><?php if( isset($rows) ){echo $rows['category_desc'];} ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Category Image<span class="text-danger">*</span></label>
                                                        <input type="file" name="category_image" data-parsley-trigger="change" required  class="form-control">
                                                    </div>
                                                    
                                                   
                                                                                                      
                                                                                                        
                                                    
                                                   

                                                    <div class="form-group text-right m-b-0">
                                                        

                                                        <?php if ( isset($rows)): ?>
                                                        	<button class="btn btn-primary" type="button" onclick="updateCategory(<?php echo $rows['category_id']; ?>);">
                                                            Update
                                                        </button>
                                                        <?php else: ?>
                                                        	<button class="btn btn-primary" type="button" onclick="addCategory();">
                                                            Submit
                                                        </button>
                                                        <?php endif ?>
                                                        <button type="reset" class="btn btn-secondary m-l-5">
                                                            Cancel
                                                        </button>
                                                    </div>

                                                    <div id="msg_succ"></div>

                                        </form>
									
									

								
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
    

    <script type="text/javascript">
    	$('#form').parsley();

    	function addCategory(){

  
    if (typeof FormData !== 'undefined'){
    var formData = new FormData( $("#new_category")[0] );
   $.ajax({
        url :'<?php echo base_url();?>Category/addCategory', 
        type : 'POST',
        data : formData,
        async : false,
        cache : false,
        contentType : false,
        processData : false, 
        success: function(data){
       $("#msg_succ").html(data);
       
       
    },
});

} 
}


function updateCategory(id){
	
	if (typeof FormData !== 'undefined'){
    var formData = new FormData( $("#new_category")[0] );
    $.ajax({
        url :'<?php echo base_url();?>Category/updateCategory/'+id,  // Controller URL
        type : 'POST',
        data : formData,
        async : false,
        cache : false,
        contentType : false,
        processData : false, 
        success: function(data){
        $("#msg_succ").html(data);
        
    	},
	});
	} 
}

    </script>

