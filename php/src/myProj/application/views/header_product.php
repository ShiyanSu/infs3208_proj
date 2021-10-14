<html>
    <head>
        <title>INFS3202 proj</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <a class="navbar-brand" href="#">EXPERIENCE BNE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
        

<!-- <div class="jumbotron pt-6">
  <h1 class="display-4">Hello Dear!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-danger btn-lg" href="#" role="button">Love me now</a>
</div>


<div class="container">
  <p>Nap all day cat dog hate mouse eat string barf pillow no baths hate everything but kitty poochy. Sleep on keyboard toy mouse squeak roll over. Mesmerizing birds. Poop on grasses licks paws destroy couch intently sniff hand. The dog smells bad gnaw the corn cob.</p>

<p>Plays league of legends stare out the window. Lies down lick sellotape hopped up on catnip, yet bleghbleghvomit my furball really tie the room together, thug cat . Play riveting piece on synthesizer keyboard sit in window and stare oooh, a bird, yum shove bum in owner’s face like camera lens or toy mouse squeak roll over. Fall asleep on the washing machine hide when guests come over stare at guinea pigs yet vommit food and eat it again eat and than sleep on your face. Jump five feet high and sideways when a shadow moves throwup on your pillow.</p>

<p>Missing until dinner time. Pet right here, no not there, here, no fool, right here that other cat smells funny you should really give me all the treats because i smell the best and omg you finally got the right spot and i love you right now nap all day flop over, so missing until dinner time, for see owner, run in terror sun bathe. Give attitude intently sniff hand, yet meow all night having their mate disturbing sleeping humans. Lounge in doorway chase imaginary bugs.</p>
</div> -->
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
</script>