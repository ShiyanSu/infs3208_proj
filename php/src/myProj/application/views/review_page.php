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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                        <a class="nav-link" href="<?php echo base_url(); ?>home">Home</a>
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
                        <a class="nav-link" href="<?php echo base_url(); ?>review_upload">Post Review</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>user_profile">Account <span class="sr-only">(current)</span></a>
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

        <div class="container">

        <div class="container">

        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0"><?php echo $title; ?></h1>

        <!-- <h2 class="font-weight-light text-center text-lg-left mt-4 mb-0">Favorite</h2> -->

        <hr class="mt-2 mb-5">

        <div class="row text-center text-lg-left">

        <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/pWkk7iiCoDM/400x300" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/aob0ukAYfuI/400x300" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/EUfxH-pze7s/400x300" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/M185_qYH8vg/400x300" alt="">
        </a>
    </div>


</div>

        </div>
            
            <div class="card mx-auto" style="width: 100%;">
            
                <div class="card-body">
                    <h5 class="card-title"><?php echo $title; ?></h5>
                    <h6 class="card-title">Post by <?php echo $username; ?> at <?php echo $date; ?>.</h6>
                <p class="card-text"><?php echo $review; ?></p>
                <p class="card-text">Liked by <?php echo $liked_times; ?> times.</p>
   
                </div>
                <?php echo form_open(base_url().'review_read/like_review'); ?>
                <form>
                <div class="form-group">
                    <input type="hidden" name="review_id" value="<?php echo $review_id;?>">
                    <input type="hidden" name="current_like" value="<?php echo $liked_times;?>">
                </div>
                    <button type="submit" class="btn btn-outline-primary btn-sm " style="width: 10%;">Like</button>
                </form>
                <?php echo form_close(); ?>

                
            </div>

            <?php if($wishlist_count == 0): ?>

            <?php echo form_open(base_url().'review_read/add_wishlist'); ?>
                <form>
                <div class="form-group">
                    <input type="hidden" name="review_id" value="<?php echo $review_id;?>">
                    <input type="hidden" name="title" value="<?php echo $title;?>">
                    <input type="hidden" name="review" value="<?php echo $review;?>">
                </div>
                    <button type="submit" class="btn btn-outline-primary btn-sm " style="width: 10%;">Add to my wishing list</button>
                </form>
            <?php echo form_close(); ?>

            <?php endif; ?>

            <?php if($wishlist_count > 0): ?>

            <?php echo form_open(base_url().'review_read/remove_wishlist'); ?>
                <form>
                <div class="form-group">
                    <input type="hidden" name="review_id" value="<?php echo $review_id;?>">
                    <input type="hidden" name="title" value="<?php echo $title;?>">
                    <input type="hidden" name="review" value="<?php echo $review;?>">
                </div>
                <button type="submit" class="btn btn-outline-primary btn-sm " style="width: 10%;">Remove from my wishing list</button>
                </form>
            <?php echo form_close(); ?>

<?php endif; ?>
            
            <br>

            <?php echo form_open(base_url().'review_read/write_review'); ?>
            <form>
            <!-- <div class="card mx-auto" style="width: 80%;"> -->
                <div class="form-group">
                    <label for="comment">Write comments</label>
                    <input type="text" class="form-control" id="comment" name="comment" placeholder="Enter your comments here" required>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="anonymousPost" name="anonymousPost">
                  <label class="custom-control-label" for="anonymousPost">Post Anonymously</label>
                </div>
                <div class="form-group">
                    <input type="hidden" name="review_id" value="<?php echo $review_id;?>">
                
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php echo form_close(); ?>

            <div class="card mx-auto" style="width: 100%;">
            
                <div class="card-body">
                    <h5 class="card-title">All Comments</h5>
                    <?php if (isset($comment)) {
                        foreach($comment as $row) {
                            echo "<p class='card-text'>$row->review_comment posted by $row->user_name</p>";
                        }
                    } ?>
   
                </div>
            </div>
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


$(document).ready(function () {

if (localStorage.getItem("my_app_name_here-quote-scroll") != null) {
    $(window).scrollTop(localStorage.getItem("my_app_name_here-quote-scroll"));
}

$(window).on("scroll", function() {
    localStorage.setItem("my_app_name_here-quote-scroll", $(window).scrollTop());
});

});
</script>


