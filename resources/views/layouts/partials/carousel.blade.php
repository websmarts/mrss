<!-- Carousel======================================= -->

<!-- https://www.tutorialrepublic.com/twitter-bootstrap-tutorial/bootstrap-carousel.php -->
<!-- https://www.w3schools.com/bootstrap/bootstrap_carousel.asp -->
    <div class="myCarousel-container">
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="{{ asset('images/slides/slide1.png')}}" alt="First Slide">

            </div>
            <div class="item">
                <img src="{{ asset('images/slides/slide2.png')}}" alt="Second Slide">

            </div>
            <div class="item">
                <img src="{{asset('images/slides/slide3.png')}}" alt="Third Slide">

            </div>
        </div>
        <!-- Carousel controls -->
        <!-- <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a> -->
    </div>
</div>
