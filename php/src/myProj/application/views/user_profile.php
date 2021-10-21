<html>
    <head>
        <title>INFS3202 proj</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
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

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/review_upload">Post Review</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/user_profile">Account <span class="sr-only">(current)</span></a>
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
        
        <div class="container emp-profile">
            <!-- <form method="post"> -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                        
                            <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/> -->

                            <img src= <?php echo base_url().'/uploads/'.$user_image?> />
                            
                        
                        
                            <!-- <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="user_image">
                            </div>

                      

                            
                            
                             -->
                           
                        </div>
                        
                       
                    </div>
                    
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $username ?>
                                       
                                    </h5>
                                    <br>
                                    <!-- <h6>
                                        Web Developer and Designer
                                    </h6> -->
                                    <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Wishlist</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a class="profile-edit-btn" href="<?php echo base_url(); ?>index.php/user_profile/edit">
                        Edit Profile
                        <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"> -->
                        </a>
                        <?php echo form_open_multipart('index.php/user_profile/upload_user_image'); ?> 
                        <div class="form-group">
                            <input type="file" name="user_image" size="20" value="Change image" /> 
                        </div>
		                <div class="form-group">
                            <input type="submit" value="upload" />
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div> -->
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $id ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $username ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $user_email ?></p>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <label>Email Verification</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                $href = "<br><a href='%s'> Verify Email </a>";
                                                if ($email_verified) {
                                                    echo 'Yes';
                                                } else {
                                                    
                                                    echo 'No';
                                                    $link = sprintf($href, base_url().'index.php/email');
                                                    echo $link;
                                                }
                                                </p>
                                            </div>
                                        </div> -->
                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>123 456 7890</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Web Developer and Designer</p>
                                            </div>
                                        </div> -->
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <?php if(isset($wishlist))
                                    foreach($wishlist as $row) {
                                        echo "
                                        <div class='row'>
                                            <div class='col-md-6'>
                                                <label>$row->title</label>
                                            </div>
                                            <div class='col-md-6'>
                                                <p>$row->review</p>
                                            </div>
                                        </div>";
                                    }?>
                                        
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </form>            -->
        </div>

    </body>

</html>

<style>

.jumbotron {
    position: relative;
    background:none;
}
.jumbotron:after {
    content : "";
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    background-image: url(https://cdn.pixabay.com/photo/2014/01/30/01/36/girl-254708_960_720.jpg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    width: 100%;
    height: 100%;
    opacity : 0.2;
    z-index: -1;
}

body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 100;
    height: 100;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>

<script>

$(document).ready(function() {


$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

     //>=, not <=
    if (scroll >= 60) {
        //clearHeader, not clearheader - caps H
        $(".navbar").addClass("bg-light");
    } else {
      $(".navbar").removeClass("bg-light");
    }
}); //missing );
  
// document ready  
});
</script>