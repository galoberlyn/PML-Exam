@extends('master')

@section('home')

  <!--=========================== Header ==================================-->
  <header id="header">
    <div class="container">
      <div id="logo" class="pull-left">
        <h1><a href="#hero">Domino's</a></h1>
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="#contact">See Orders</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--========================== Display Section ============================-->
  <section id="hero">
    <div class="hero-container">
      <h1>Pizza Cravings?</h1>
      <h2>Awesome! You've come to the right place. Order now!</h2>
      <a href="#about" class="btn-get-started">PML Upload</a><br>
      <h2>OR</h2>
      <a data-toggle="modal" href="" data-target="#textAreaModal" class="btn-get-started">Enter Order in pml format</a>
    </div>
  </section><!-- #hero -->

  <!-- ====================Modal for Pizza Markup Language=================== -->
<div class="modal fade" id="textAreaModal" tabindex="-1" role="dialog" aria-labelledby="textAreaModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="textAreaLabel">What's the order?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<!-- todo form, validation and all that -->
        <textarea class="form-control" style="min-width: 100%"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-custom">Save changes</button>
      </div>
    </div>
  </div>
</div> 
<!-- modal pml -->

@endsection