  @if(session('error'))
  <div class="container">
  <div class="row">      
  <div id="error" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <div class="modal-body">
        
        <div class="col-xs-1" align="center">
          <h3 style="color: red;">Oops</h3>
          <p style="color: red;">It looks like, you've entered an invalid pml format :(</p>
        </div>
        </div>
      </div>
    </div>
  </div>
  </div>  
  </div>
  @endif

  @if(session('success'))
 <div class="container">
  <div class="row">      
  <div id="success" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <div class="modal-body">
      <div class="col-xs-1" align="center">
        <h3 style="color: green;">Success!</h3>
        <p style="color: green;">Order is now in our records, thanks! :)</p>
      </div>
        </div>
      </div>
    </div>
  </div>
  </div>  
  </div>
  @endif

  @if(session('exist'))
 <div class="container">
  <div class="row">      
  <div id="exists" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel3">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <div class="modal-body">
      <div class="col-xs-1" align="center">
        <h3 style="color: orange;">Failed!</h3>
        <p style="color: orange;">Order already exists</p>
      </div>
        </div>
      </div>
    </div>
  </div>
  </div>  
  </div>
  @endif

   @if(session('wrong_type'))
 <div class="container">
  <div class="row">      
  <div id="wrong" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel4">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <div class="modal-body">
      <div class="col-xs-1" align="center">
        <h3 style="color: orange;">Sorry!</h3>
        <p style="color: orange;">Only Chicken Fajita(1), Hawaiian(2), or custom(3) pizza type is available</p>
      </div>
        </div>
      </div>
    </div>
  </div>
  </div>  
  </div>
  @endif