<html>
    <head>
        <title>INFS3202 proj</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js"></script>

   

            <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/plugins/piexif.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/plugins/sortable.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/fileinput.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/themes/fa/theme.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>

            
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <a class="navbar-brand" href="#">EXPERIENCE BNE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>home">Home </a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            All Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Restaurant</a>
                            <a class="dropdown-item" href="#">Shops</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>review_upload">Post Review<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>user_profile">Account</a>
                    </li>

                    <li class="nav-item">
                        <!-- <a class="nav-link" href="#">Sign In</a> -->
                        <?php if(!$this->session->userdata('logged_in')) : ?>
                            
                                <a class="nav-link" href="<?php echo base_url(); ?>login_new"> Login </a>
                            
                        <?php endif; ?>
                        <?php if($this->session->userdata('logged_in')) : ?>
                            
                                <a class="nav-link" href="<?php echo base_url(); ?>login_new/logout"> Logout </a>
                            
                        <?php endif; ?>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
                </form>

                
            </div>
        </nav>

        <br>
        <br>
        <?php echo !empty($statusMsg)?'<p class="status-msg">'.$statusMsg.'</p>':''; ?>
        <div id="infor">
        <?php echo form_open(base_url().'review_upload/post_text_review'); ?> 
        
            <div class="form-group">
                <label for="exampleInputPassword1">Review Title</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="title" placeholder="Write a title for this review" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Select a category for this review</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category">
                    <option>Food</option>
                    <option>Movies</option>
                    <option>Cars</option>
                    <option>Hotels</option>
                    <option>Resorts</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Write your review here</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name='review' rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
        
        <?php echo form_close(); ?>
        </div>
        <!-- <button id="img_up_bottom">IMG</button> -->

        <!-- <form method="post" action="<?php base_url().'review_upload/post_image'?>" enctype="multipart/form-data">
      
            <label for="input-res-1">File Gallery</label> -->
            <!-- <div class="file-loading form-group"> -->
            <div  id="img_up" style="display:none">
                <input id="input_file" name="image_name[]" type="file" multiple class="file-loading ">
            </div>
            <!-- </div> -->

        <!-- </form> -->

            
        
    </body>
</html>



<script>

$("#img_up_bottom").click(function(){
    $("#img_up").show();
    $("#infor").hide();
    $("#img_up_bottom").hide();
});

$('#input_file').fileinput({
        uploadUrl: "<?php echo base_url().'review_upload/p'?>",
        
        maxFileCount: 5,
        showCaption: true,//是否显示被选文件的简介
        showUpload: true,//是否显示上传按钮
        showRemove: true,//是否显示删除按钮
        showClose: true,//是否显示关闭按钮
        enctype: 'multipart/form-data',
        uploadAsync:false, 
        theme: 'fas',
       
        fileActionSettings: {
            showZoom: function(config) {
                if (config.type === 'pdf' || config.type === 'image') {
                    return true;
                }
                return false;
            }
        }
    }).on("filebatchuploadsuccess", function(event, data) {
        $.each(data.files, function(key, file) {
            console.log(file.name);
        });
    });


</script>