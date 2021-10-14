<footer>
    <div class="container">
        <div class="row vcenter">
            <div class="col-xs-6">
                <p>&copy; 2021-<?php echo date("Y"); ?></p>
            </div>
        </div>
    </div>

    
</footer>
</body>
</html>

<script>
        
        

        setInterval(function() {
                var getTimeStamp = sessionStorage.getItem('lastActiveTime');
                compareTime(getTimeStamp);
                console.log(getTimeStamp);
            }, 3000);

        function compareTime(lastActiveTime) {
            var currentTimeStamp = new Date();
            var lastTimeStamp = new Date(lastActiveTime);
            var timeDifference = currentTimeStamp - lastTimeStamp;
            var isLoggedIn = parseInt(<?php echo $this->session->userdata('logged_in'); ?>);
            console.log(isLoggedIn);
            if (isLoggedIn) {
                // automatic logout if user does not active for more than 5 min
                if (timeDifference > 10000) {
                    console.log(isLoggedIn);
                    sessionStorage.removeItem('lastActiveTime');
                    
                    //window.location.href = 'https://www.google.com';
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>/index.php/login_new/auto_logout",
                        data: {},
                        //dataType: "json",
                        //cache: false,
                        success: function(result) {
                            console.log('logout');
                        }
                    });


                    //clearInterval(timer);

                }
            } else {
                console.log('123')
            }
            
        }

        $(document).mousemove(function() {
            var timeStamp = new Date();
            sessionStorage.setItem('lastActiveTime', timeStamp);
            //console.log(sessionStorage.getItem('lastActiveTime'));
        });
</script>
