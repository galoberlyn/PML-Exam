  @if(session('error'))
  <div class="container">
  <div class="row">      
  <div id="error" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <div class="modal-body">
        
        <div class="col-xs-1" align="center">
          <h3 style="color: red;">Oops</h3>
          <p style="color: red;">It looks like, you've entered an invalid pml string ;(</p>
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
    <div class="modal-dialog modal-lg">
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