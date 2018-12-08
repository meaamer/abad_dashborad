

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
	                                    <h1 class="main-title float-left">Business Registration</h1>
	                                    <ol class="breadcrumb float-right">
	                                        <li class="breadcrumb-item">Home</li>
	                                        <li class="breadcrumb-item active">Business</li>
	                                    </ol>
	                                    <div class="clearfix"></div>
	                            </div>
	                    </div>
	            </div>
	            <!-- end row -->
            

          

            
            <div class="row">
                    <div class="col-md-2"></div>
            			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">                        
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-hand-pointer-o"></i> New Business</h3>
                               
                            </div>
                            <div class="card-body">
                                <form class="demo-form" id="new_business">
                                	<div class="form-section">
                                        <div class="card-body">
                                        	<input name="userfile[]" id="filer_example1" 
                                        	type="file" multiple="" />
                                        	<input type="hidden" name="inserted_id" value="<?php echo $last_id ?>">
                                        </div>  
                                    </div>  
                                	<br /><br />
                                    <div id="msg_succ"></div>
                                    <br /><br />
                                    
                                  <div class="form-navigation">
                                    <button type="button" class="previous btn btn-info pull-left">&lt; Previous</button>
                                    <button type="button" class="next btn btn-info pull-right">Next &gt;</button>
                                    <input type="button" value="Submit" class="submitbtn btn btn-primary pull-right" onclick="addBusiness();">
                                    <span class="clearfix"></span>
                                  </div>
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
    
    





<script>
  
 $(function () {
      var $sections = $('.form-section');

      function navigateTo(index) {
        // Mark the current section with the class 'current'
        $sections
          .removeClass('current')
          .eq(index)
            .addClass('current');
        // Show only the navigation buttons that make sense for the current section:
        $('.form-navigation .previous').toggle(index > 0);
        var atTheEnd = index >= $sections.length - 1;
        $('.form-navigation .next').toggle(!atTheEnd);
        $('.form-navigation .submitbtn').toggle(atTheEnd);
      }

      function curIndex() {
        // Return the current index by looking at which section has the class 'current'
        return $sections.index($sections.filter('.current'));
      }

      // Previous button is easy, just go back
      $('.form-navigation .previous').click(function() {
        navigateTo(curIndex() - 1);
      });

      // Next button goes forward iff current block validates
      $('.form-navigation .next').click(function() {
        $('.demo-form').parsley().whenValidate({
          group: 'block-' + curIndex()
        }).done(function() {
          navigateTo(curIndex() + 1);
        });
      });

      // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
      $sections.each(function(index, section) {
        $(section).find(':input').attr('data-parsley-group', 'block-' + index);
      });
      navigateTo(0); // Start at the beginning
    });
    //# sourceURL=pen.js


</script>


<script>
$(document).ready(function(){

  'use-strict';

    //Example 2
    $('#filer_example2').filer({
        limit: 3,
        maxSize: 3,
        extensions: ['jpg', 'jpeg', 'png', 'gif', 'psd'],
        changeInput: true,
        showThumbs: true,
        addMore: true
    });

  //Example 1
    $("#filer_example1").filer({
        limit: null,
        maxSize: null,
        extensions: ['jpg', 'jpeg', 'png'],
        changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag & Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn btn btn-custom">Browse Files</a></div></div>',
        showThumbs: true,
        theme: "dragdropbox",
        templates: {
            box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
            item: '<li class="jFiler-item">\
                        <div class="jFiler-item-container">\
                            <div class="jFiler-item-inner">\
                                <div class="jFiler-item-thumb">\
                                    <div class="jFiler-item-status"></div>\
                                    <div class="jFiler-item-info">\
                                        <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        <span class="jFiler-item-others">{{fi-size2}}</span>\
                                    </div>\
                                    {{fi-image}}\
                                </div>\
                                <div class="jFiler-item-assets jFiler-row">\
                                    <ul class="list-inline pull-left">\
                                        <li>{{fi-progressBar}}</li>\
                                    </ul>\
                                    <ul class="list-inline pull-right">\
                                        \
                                    </ul>\
                                </div>\
                            </div>\
                        </div>\
                    </li>',
            itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                            <span class="jFiler-item-others">{{fi-size2}}</span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            \
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>',
            progressBar: '<div class="bar"></div>',
            itemAppendToEnd: false,
            removeConfirmation: true,
            _selectors: {
                list: '.jFiler-items-list',
                item: '.jFiler-item',
                progressBar: '.bar',
                remove: '.jFiler-item-trash-action'
            }
        },
        dragDrop: {
            dragEnter: null,
            dragLeave: null,
            drop: null,
        },
        uploadFile: {
            url: "assets/plugins/jquery.filer/php/upload.php",
            data: null,
            type: 'POST',
            enctype: 'multipart/form-data',
            beforeSend: function(){},
            success: function(data, el){
                var parent = el.find(".jFiler-jProgressBar").parent();
                el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                    $("<div class=\"jFiler-item-others text-success\"><i class=\"fa fa-plus\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");
                });
            },
            error: function(el){
                var parent = el.find(".jFiler-jProgressBar").parent();
                el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                    $("<div class=\"jFiler-item-others text-error\"><i class=\"fa fa-minus\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");
                });
            },
            statusCode: null,
            onProgress: null,
            onComplete: null
        },
    files: [
      
    ],

        addMore: false,
        clipBoardPaste: true,
        excludeName: null,
        beforeRender: null,
        afterRender: null,
        beforeShow: null,
        beforeSelect: null,
        onSelect: null,
        afterShow: null,
        onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){
            var file = file.name;
            $.post('assets/plugins/jquery.filer/php/remove_file.php', {file: file});
        },
        onEmpty: null,
        options: null,
        captions: {
            button: "Choose Files",
            feedback: "Choose files To Upload",
            feedback2: "files were chosen",
            drop: "Drop file here to Upload",
            removeConfirmation: "Are you sure you want to remove this file?",
            errors: {
                filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
                filesType: "Only Images are allowed to be uploaded.",
                filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
                filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."
            }
        }

    });
 
});


function addBusiness(){

//alert(JSON.stringify($(".mulll").val()));
  
    if (typeof FormData !== 'undefined'){
    var formData = new FormData( $("#new_business")[0] );
   $.ajax({
        url :'<?php echo base_url();?>Registration/addOtherImage', 
        type : 'POST',
        data : formData,
        async : false,
        cache : false,
        contentType : false,
        processData : false, 
        success: function(data){
       $("#msg_succ").html(data);
      },error: function(xhr, status, error) {
      console.log(xhr);
    }
});

} 
}
 

</script>


<!-- END Java Script for this page -->
