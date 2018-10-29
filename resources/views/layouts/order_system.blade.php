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
          <li><a href="/received">See Orders</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--========================== Display Section ============================-->
  <section id="hero">
    <div class="hero-container">
      <h1>Pizza Cravings?</h1>
      <h2>Awesome! You've come to the right place. Order now!</h2>
      <a data-toggle="modal" href="" data-target="#textAreaModal" class="btn-get-started">Enter Order in pml format</a>
    </div>
  </section><!-- #hero -->

  <!-- ====================Modal for Pizza Markup Language=================== -->
<form action='/received' method="POST">
{{csrf_field()}}
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
          <textarea name="pml_order" rows="16" style="font-size: 15px;" class="form-control"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-custom">Send Order</button>
      </div>
    </div>
  </div>
</div> 
</form>
<!-- modal pml -->

@endsection