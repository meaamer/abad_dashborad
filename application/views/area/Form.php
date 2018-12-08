

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
                                    <h1 class="main-title float-left">Area</h1>
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
			
                    <div class="col-md-2">						
										
                    </div>

					
					
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> New Area</h3>
								
							</div>
								
							<div class="card-body">
								

								<form id="new_area" data-parsley-validate novalidate>
									
									

                                    <div class="form-group">
                                        <label for="userName">Area Name<span class="text-danger">*</span></label>
                                        <input type="text" name="area_name" data-parsley-trigger="change" required placeholder="Name of area" class="form-control"
                                        value="<?php if( isset($rows) ){echo $rows['area_name'];} ?>">
                                    </div>

     								<div class="form-group text-right m-b-0">
                                        <?php if ( isset($rows)): ?>
                                    	<button class="btn btn-primary" type="button" onclick="updateArea(<?php echo $rows['area_id']; ?>);">
	                                        Update
	                                    </button>
	                                    <?php else: ?>
	                                    	<button class="btn btn-primary" type="button" onclick="addArea();">
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


	function addArea(){
    
    var form =$("#new_area");
      $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Area/addArea",
      data:form.serialize(),
      success: function(response){
     $("#msg_succ").html(response);
         
      }
    });
  }

  function updateArea(id){
    
    var form =$("#new_area");
      $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Area/updateArea/"+id,
      data:form.serialize(),
      success: function(response){
     $("#msg_succ").html(response);
     
         
      }
    });
  }

</script>

