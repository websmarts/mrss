@extends('layouts.default')

@section('content')

@include('layouts.partials.carousel')

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->



      <!-- Three columns of text below the carousel -->
      <div class="row" style="background: #fff; margin-top:10px;">
        <div class="col-sm-4">
          <div ><img   src="{{asset('images/we_bring.png') }}" alt="We Bring Icon" width="88" height="75"></div>
          <h2>We Bring</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-4">
          <div ><img   src="{{asset('images/you_load.png') }}" alt="You Load Icon" width="88" height="75"></div>
          <h2>You load</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-4">
          <div ><img  src="{{asset('images/we_store.png') }}" alt="We Store Icon" width="88" height="75"></div>
          <h2>We store</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <!-- <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider"> -->

      <!-- /END THE FEATURETTES -->
<app></app>

@endsection


@section('scripts')
<script>

	let products = [
	{id: '1', code: 'P1', name: 'Product one', description: 'Product one description',notes:'product one notes', price:2500},
	{id: '2', code: 'P2', name: 'Product two', description: 'Product two description',notes:'product two notes', price:150},
	{id: '3', code: 'P3', name: 'Product three', description: 'Product three description',notes:'product three notes', price:912},
	{id: '4', code: 'P4', name: 'Product four', description: 'Product four description',notes:'product four notes', price:1234},
	{id: '5', code: 'P4', name: 'Insurance product', description: 'Insurance packages',notes:'Choose the number of insurance units you require. <br />1 unit of insurance = $1,000 cover  $2.30pw<br />2 units of insurance = $10,000 cover  $4.60pw<br />3 units of insurance = $15,000 cover  $6.90pw<br />4 units of insurance = $20,000 cover  $9.20pw<br />', price:230},
	];



</script>

<!-- <script src="{{-- mix('js/spa.js') --}}"></script> -->
@endsection
