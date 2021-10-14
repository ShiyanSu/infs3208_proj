<html>
    <head>
        <title>INFS3202 proj</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js"></script>

        <!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
           
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
            
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/piexif.min.js" type="text/javascript"></script>
            
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/sortable.min.js" type="text/javascript"></script>
            
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
           
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- the main fileinput plugin file -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/fileinput.min.js"></script>
        <!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/themes/fas/theme.min.js"></script>
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
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/home">Home</a>
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
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/review_upload">Post Review<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/user_profile">Account</a>
                    </li>

                    <li class="nav-item">
                        <!-- <a class="nav-link" href="#">Sign In</a> -->
                        <?php if(!$this->session->userdata('logged_in')) : ?>
                            
                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/login_new"> Login </a>
                            
                        <?php endif; ?>
                        <?php if($this->session->userdata('logged_in')) : ?>
                            
                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/login_new/logout"> Logout </a>
                            
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

        <?php echo form_open_multipart('index.php/review_upload/post_image_review'); ?> 
        <label for="input_file">Step two: choose images for the review</label>
        <input id="input_file" name="image_name[]" type="file" multiple class="file-loading ">
        <?php echo form_close(); ?>
    </body>
</html>

<script>
    $('#input_file').fileinput({
        uploadUrl: "<?php echo base_url().'index.php/review_upload/post_image_review'?>",
        
        maxFileCount: 5,
        showCaption: true,
        showUpload: true,
        showRemove: true,
        showClose: true,
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