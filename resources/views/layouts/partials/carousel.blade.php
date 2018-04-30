<!-- Carousel======================================= -->

<!-- https://www.tutorialrepublic.com/twitter-bootstrap-tutorial/bootstrap-carousel.php -->
<!-- https://www.w3schools.com/bootstrap/bootstrap_carousel.asp -->
    <div class="myCarousel-container">
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Carousel indicators -->
        
        <!-- Wrapper for carousel items -->
        
        <div class="carousel-inner">
        @foreach($slides as $slide)
       
            <div class="item{{ $loop->first ? ' active': '' }}">
                <img src="{{ asset('images/slides')}}/{{ $slide->getFilename()}}?{{$slide->getMTime()}}" alt="Slide_{{$loop->index}}">
            </div>

        @endforeach
            
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
