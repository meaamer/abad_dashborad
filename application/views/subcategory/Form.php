

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
                                    <h1 class="main-title float-left">Sub Category</h1>
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
								<h3><i class="fa fa-hand-pointer-o"></i> New Sub Category</h3>
								
							</div>
								
							<div class="card-body">
								

								<form id="new_category" data-parsley-validate novalidate>
									
									<div class="form-group">
		                                <label for="example1">
										Select Category: 
										</label>
										<select class="form-control select2"  name="main_category">    
											<?php if (!isset($rows)): ?>
	                                                 <option selected disabled="">Select</option>
	                                       <?php endif ?>
	                                       <?php foreach ($mainCates as $cats): ?>
												<option value="<?php echo $cats['category_id']; ?>">
													<?php echo $cats['category_name']; ?></option>
										   <?php endforeach ?>

											<?php if (isset($rows)): ?>
	                                                 <option selected="" value="<?php echo $rows['category_id']; ?>"><?php echo $rows['category_name']; ?></option>
	                                       <?php endif ?>
										</select>
									</div>

                                    <div class="form-group">
                                        <label for="userName">Category Name<span class="text-danger">*</span></label>
                                        <input type="text" name="subcategory_name" data-parsley-trigger="change" required placeholder="Name of Category" class="form-control"
                                        value="<?php if( isset($rows) ){echo $rows['subcategory_name'];} ?>">
                                    </div>

                                     <div class="form-group">
                                        <label for="userName">Tag Line<span class="text-danger">*</span></label>
                                        <input type="text" name="tag_line" data-parsley-trigger="change" required placeholder="Tag Line" class="form-control"
                                        value="<?php if( isset($rows) ){echo $rows['tag_line'];} ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="userName">Image<span class="text-danger">*</span></label>
                                        <input type="file" name="subcategory_image" data-parsley-trigger="change" required placeholder="Tag Line" class="form-control"
                                        >
                                    </div>

     								<div class="form-group text-right m-b-0">
                                        <?php if ( isset($rows)): ?>
                                    	<button class="btn btn-primary" type="button" onclick="updateCategory(<?php echo $rows['subcategory_id']; ?>);">
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
	$(document).ready(function() {
    $('.select2').select2();
	});


	

 function addCategory(){

  
    if (typeof FormData !== 'undefined'){
    var formData = new FormData( $("#new_category")[0] );
   $.ajax({
        url :'<?php echo base_url();?>SubCategory/addCategory', 
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
        url :'<?php echo base_url();?>SubCategory/updateCategory/'+id, 
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

