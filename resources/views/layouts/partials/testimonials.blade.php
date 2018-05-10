<!-- Carousel======================================= -->

<!-- https://www.tutorialrepublic.com/twitter-bootstrap-tutorial/bootstrap-carousel.php -->
<!-- https://www.w3schools.com/bootstrap/bootstrap_carousel.asp -->
    <div class="testimonials-container">
    <div id="testimonials" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        
        <!-- Wrapper for carousel items -->
        
        <div class="carousel-inner">
        @foreach($testimonials  as $testimonial)
       
            <div style="text-align: center; color: #fff" class="item{{ $loop->first ? ' active': '' }}">

                    
                        <p class="heading">{{ $testimonial['heading'] }}</p>

                        <p class="message">&quot;{{ $testimonial['message'] }}&quot;</p>

                        <p class="who">{{ $testimonial['who'] }}</p>
                    
            </div>

        @endforeach
            
        </div>
        <!-- Carousel controls -->
        <!-- <a class="carousel-control left" href="#testimonials" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#testimonials" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a> -->
    </div>
</div>
