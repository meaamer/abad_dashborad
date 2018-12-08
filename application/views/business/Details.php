
    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">


			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Business Details</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Details</li>
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
								<div class="row">
									<div class="col-md-8">
								<h3><i class="fa fa-hand-pointer-o"></i>Details of <?php echo $details['business_name']; ?></h3>
									</div>
									<div class="col-md-2">
										<?php if ($details['status']==0): ?>
											<button class="btn btn-success pull-right"
											onclick="changeStatus(1,<?php echo $details['business_id']; ?>);">Active</button>
										<?php else: ?>
											<button class="btn btn-danger pull-right"
											onclick="changeStatus(0,<?php echo $details['business_id']; ?>);">Deactive</button>
										<?php endif ?>
                                    </div>

                                       <div class="col-md-2"> 
                                            <a href="<?php echo base_url('Registration/getBusinesById/').$details['business_id']; ?>" class="btn btn-primary">Update</a>
                                        
                                            <button class="btn btn-warning"
                                            onclick="deleteBusiness(<?php echo $details['business_id']; ?>);">Delete</button>
                                           </div>
								   </div>      
								
								</div>
							</div>
								
							<div class="card-body">
																
								
								
								<table class="table table-bordered">
                                    <tr>
                                        <td>#ID </td>
                                        <td><?php echo $details['business_id']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Business name </td>
                                        <td><?php echo $details['business_name']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Main category</td>
                                        <td><?php echo $details['category_name']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Sub category</td>
                                        <td><?php echo $details['subcategory_name']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Mobile number</td>
                                        <td><?php echo $details['mobile_one']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Alternate Number</td>
                                        <td><?php echo $details['mobile_two']; ?></td>
                                    </tr>


                                    <tr>
                                        <td>Email id</td>
                                        <td><?php echo $details['email_id']; ?></td>
                                    </tr>


                                    <tr>
                                        <td>Business address</td>
                                        <td><?php echo $details['address']; ?></td>
                                    </tr>


                                    <tr>
                                        <td>Area name</td>
                                        <td><?php echo $details['area_name']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>City name</td>
                                        <td><?php echo $details['city_name']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Business establish date</td>
                                        <td><?php echo $details['establish_date']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>About business</td>
                                        <td><?php echo $details['about_business']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Working hours</td>
                                        <td><?php echo $details['working_hour']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Register date</td>
                                        <td><?php echo $details['register_date']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Expire date</td>
                                        <td><?php echo $details['expire_date']; ?></td>
                                    </tr> 
                                    

                                </table>

                                <div class="row">
                                	<img width="150" height="150" border="15"
                                	src="<?php echo base_url('uploads/').$details['feature_image']; ?>" >&nbsp;
                                	<?php if (!empty($images)): ?>
                                		<?php foreach ($images as $image): ?>
                                			<img width="150" height="150" src="<?php echo base_url('uploads/files/').$image['image_path']; ?>">&nbsp;
                                		<?php endforeach ?>
                                	<?php endif ?>
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
  function changeStatus(status,id)
  {

    $.ajax({
      type:'POST',
      url:'<?php echo base_url('')?>Registration/changeStatus/'+status+'/'+id,
      success:function(response)
      {
        window.location.reload();
      }
    });
  }


function deleteBusiness(id)
{
    alertify.confirm("confirm","Sure You Want To Delete This.",function()
    {
        $.ajax({
        type:"POST",
        url:"<?php echo base_url()?>Registration/deleteBusiness/"+id,
        success: function(response)
        {
          alertify.success(response);
          window.history.back();
          
        }
      });
    },
    function(){
        alertify.error('Cancel');
    });
}
     
</script>
