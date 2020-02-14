
  @extends('layouts.app')

  @section('content')
  <main role="main">

    <section class="jumbotron text-center" style="margin-top:-30px; margin-bottom:-40px ; padding:-60%">
      <div class="container">
        <h1>Album example</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </section>

    <div class="album py-5 bg-light">
      <div class="container">
  
        <div class="row">
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{asset('uploads/sunset.jpg')}}">
              <title>Placeholder</title>
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{asset('uploads/cloth.jpg')}}">
              <title>Placeholder</title>
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{asset('uploads/musician.jpg')}}">
              <title>Placeholder</title>
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>

  <footer class="page-footer font-small blue pt-4">
    <div class="container">
      <p class="float-right">
        <a href="#">Back to top</a>
      </p>
      <p>VVee is created to ease online sharing, whatever you wish, we deliver, just for YOU!</p>
      <p>&copy; <a href="http://localhost:70/upapp/public/"> VVee </a>2020.</p>
      <p class="text-center ml-auto">
      <a href="http://localhost:70/upapp/public/posts//">About us </a>
      <a  href="http://localhost:70/upapp/public/posts//"> | Contact</a></p>
        
        
          </div>
  </footer>
@endsection 


