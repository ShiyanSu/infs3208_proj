<html>
<head>
        <title>INFS3202 proj</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

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
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/stripeController">Donate for us</a>
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
            <h2><u>recent reviews</u></h2>
            <br />
            <div id="load_data"></div>
            <div id="load_data_message"></div>
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
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

h2 {
  text-align: center;
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


$(document).ready(function(){

var limit = 7;
var start = 0;
var action = 'inactive';

function lazzy_loader(limit)
{
  var output = '';
  for(var count=0; count<limit; count++)
  {
    output += '<div class="card mx-auto" style="width: 50rem;">';
    output += '<div class="card-body"> <h5 class="card-title">&nbsp</h5>';
    output += '<p class="card-text">&nbsp;</p>';
    output += '</div></div>';
  }
  $('#load_data_message').html(output);
}

lazzy_loader(limit);

function load_data(limit, start)
{
  $.ajax({
    url:"<?php echo base_url(); ?>index.php/load_review/fetch",
    method:"POST",
    data:{limit:limit, start:start},
    cache: false,
    success:function(data)
    {
      if(data == '')
      {
        $('#load_data_message').html('<h3>No More Result Found</h3>');
        action = 'active';
      }
      else
      {
        $('#load_data').append(data);
        $('#load_data_message').html("");
        action = 'inactive';
      }
    }
  })
}

if(action == 'inactive')
{
  action = 'active';
  load_data(limit, start);
}

$(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
    lazzy_loader(limit);
    action = 'active';
    start = start + limit;
    load_data(limit, start);
    // setTimeout(function(){
    //   load_data(limit, start);
    // }, 1000);
  }
  
});

});

// $(document).ready(function () {

// if (localStorage.getItem("my_app_name_here-quote-scroll") != null) {
//     $(window).scrollTop(localStorage.getItem("my_app_name_here-quote-scroll"));
// }

// $(window).on("scroll", function() {
//     localStorage.setItem("my_app_name_here-quote-scroll", $(window).scrollTop());
// });

// });


</script>