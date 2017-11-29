<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Equity Manager Landing Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="/css/lander.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div id="confirmModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmModal">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Message Sent</h4>
                </div>
                <div class="modal-body">
                    <p class="bg-success">Thank you, your message has been sent.</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <section class="jumbotron">
        <header class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <a href="/" class="logo"><img src="/images/logo.png"></a>

                    <a href="{{url('login')}}" class="btn btn-default pull-right">Login</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center video" id="video-container">
                    <video width="80%" poster="/images/tablet.png" id="video" >
                        <source src="/video/intro.webm" type="video/webm">
                        <source src="/video/intro.mp4" type="video/mp4">
                    </video>
                    <img src="/images/play.png" id="play-btn">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Find <span>the moment</span> your customers are ready for a new car</h1>
                </div>
            </div>
        </header>
    </section>

    <section class="white">
        <div class="container text">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <img src="/images/gui.png" class="gui" />
                    <h2>How can a dealer discover the moment their customers are ready to upgrade their car?</h2><hr>

                    <p>Finding the right time to upgrade a customer's current car finance agreement is a challanging task.</p>

                    <p>Using information about your customer, coupled with Equity Manager's valuation system, can identify for you the 'when moment' you should contact your customer about upgrading their car.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="grey">
        <div class="container text">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h2>How it works</h2><hr>
                    <p>Using your current customer data, Equity Manager calculate's the current settlement and a guideline valuation providing the vehicle equity value for each customer.</p>
                    <p>Equity Manager matches the closest vehicle to the customers existing one from your new or used stock. It calculates PCP/HP finance packages and presents these to your salesteam to quickly and automatically identify new sales opporutunities.</p>

                    <p>Equity Manager gives Manufacturers or Dealership owners full visibility and real time information on all opportunities across their network.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">
        <footer class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h2>Contact Us</h2><hr>
                    <p>For more information contact our main sales agent for Equity Manager, Motorcheck. Please fill out please fill out a form and a sales agent will contact you.</p>
                    <form id="form" action="" onsubmit="return false;" type="get">
                    <div class="row">
                            <div class="col-lg-6">
                                <input name="name" type="text" class="form-control"  placeholder="Name" autocomplete="off"><br>
                                <input name="telephone" type="tel" class="form-control"  placeholder="Telephone" autocomplete="off"><br>
                            </div>
                            <div class="col-lg-6">
                                <input name="company" type="text" class="form-control"  placeholder="Company" autocomplete="off"><br>
                                <input name="email" type="email" class="form-control"  placeholder="Email" autocomplete="off"><br>
                            </div>
                        </div>
                        <textarea name="message" class="form-control" placeholder="Message" autocomplete="off"></textarea>
                        <br>
                        <button id="submit" type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </footer>
    </section>

    <script src="/js/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
            window.onload = function() {

                var submit = document.getElementById("submit");
                var form = $('#form');

                function submitForm() {
                    var ok = function (res) {
                        form.hide();
                        $('#confirmModal').modal('show');
                    }
                    $.get('/send/contact', form.serialize(), ok);
                }

                submit.addEventListener("click", submitForm);


                var video = document.getElementById("video");
                var play = document.getElementById("play-btn");
                var container = document.getElementById("video-container");


                play.addEventListener("click", function() {
                        video.play();
                        play.className += " hide";
                });

                video.addEventListener("click", function() {
                    if(video.paused){
                        video.play();
                        play.className += " hide";
                    }else {
                        video.pause();
                        play.className = "";
                    }
                });

                video.addEventListener("play", function(){
                    play.className += " hide";
                });

                video.addEventListener("pause", function(){
                    play.className = "";
                });


                video.addEventListener("ended", function(){
                    play.className = "";
                });


            }
    </script>

</body>
</html>
