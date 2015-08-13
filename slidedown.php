<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>


        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Portfolio Image Rotator by Soh Tanaka</title>

            <style type="text/css">
                body {
                    background: #222;
                    margin: 0; padding: 0;
                    font: normal 10px Verdana, Arial, Helvetica, sans-serif;
                }
                *{outline: none;}
                img {border: 0;}
                .container {
                    width: 790px;
                    padding: 0;
                    margin: 0 auto;
                }
                .folio_block {
                    position: absolute;
                    left: 50%; top: 50%;
                    margin: -140px 0 0 -395px;
                }


                /*--Main Container--*/
                .main_view {
                    float: left;
                    position: relative;
                }
                /*--Window/Masking Styles--*/
                .window {
                    height:286px;	width: 790px;
                    overflow: hidden; /*--Hides anything outside of the set width/height--*/
                    position: relative;
                }
                .image_reel {
                    position: absolute;
                    top: 0; left: 0;
                }
                .image_reel img {float: left;}

                /*--Paging Styles--*/
                .paging {
                    position: absolute;
                    bottom: 40px; right: -7px;
                    width: 178px; height:47px;
                    z-index: 100; /*--Assures the paging stays on the top layer--*/
                    text-align: center;
                    line-height: 40px;
                    background: url(paging_bg2.png) no-repeat;
                    display: none; /*--Hidden by default, will be later shown with jQuery--*/
                }
                .paging a {
                    padding: 5px;
                    text-decoration: none;
                    color: #fff;
                }
                .paging a.active {
                    font-weight: bold;
                    background: #920000;
                    border: 1px solid #610000;
                    -moz-border-radius: 3px;
                    -khtml-border-radius: 3px;
                    -webkit-border-radius: 3px;
                }
                .paging a:hover {font-weight: bold;}
            </style>

    </head><body>
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript">

            $(document).ready(function() {

                //Set Default State of each portfolio piece
                $(".paging").show();
                $(".paging a:first").addClass("active");

                //Get size of images, how many there are, then determin the size of the image reel.
                var imageWidth = $(".window").width();
                var imageSum = $(".image_reel img").size();
                var imageReelWidth = imageWidth * imageSum;

                //Adjust the image reel to its new size
                $(".image_reel").css({'width' : imageReelWidth});

                //Paging + Slider Function
                rotate = function(){
                    var triggerID = $active.attr("rel") - 1; //Get number of times to slide
                    var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

                    $(".paging a").removeClass('active'); //Remove all active class
                    $active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)

                    //Slider Animation
                    $(".image_reel").animate({
                        left: -image_reelPosition
                    }, 500 );

                };

                //Rotation + Timing Event
                rotateSwitch = function(){
                    play = setInterval(function(){ //Set timer - this will repeat itself every 3 seconds
                        $active = $('.paging a.active').next();
                        if ( $active.length === 0) { //If paging reaches the end...
                            $active = $('.paging a:first'); //go back to first
                        }
                        rotate(); //Trigger the paging and slider function
                    }, 7000); //Timer speed in milliseconds (3 seconds)
                };

                rotateSwitch(); //Run function on launch

                //On Hover
                $(".image_reel a").hover(function() {
                    clearInterval(play); //Stop the rotation
                }, function() {
                    rotateSwitch(); //Resume rotation
                });

                //On Click
                $(".paging a").click(function() {
                    $active = $(this); //Activate the clicked paging
                    //Reset Timer
                    clearInterval(play); //Stop the rotation
                    rotate(); //Trigger rotation immediately
                    rotateSwitch(); // Resume rotation
                    return false; //Prevent browser jump to link anchor
                });

            });
        </script>

        <div class="container">

            <div class="folio_block">

                <div class="main_view">
                    <div class="window">
                        <div style="width: 3160px; left: -2370px;"
                             class="image_reel">
                            <a href="#"><img
                                    src="reel_1.jpg"
                                    alt=""/></a>
                            <a href="#"><img
                                    src="reel_2.jpg"
                                    alt=""/></a>
                            <a href="#"><img
                                    src="reel_3.jpg"
                                    alt=""/></a>
                            <a href="#"><img
                                    src="reel_4.jpg"
                                    alt=""/></a>
                        </div>
                    </div>
                    <div style="display: block;" class="paging">
                        <a class="" href="#" rel="1">1</a>
                        <a class="" href="#" rel="2">2</a>
                        <a class="" href="#" rel="3">3</a>
                        <a class="" href="#" rel="4">4</a>
                    </div>
                </div>
            </div>

        </div>



    </body></html>
