@extends('master')


@section('orders')

<h1><span class="blue">{</span>Pizza<span class="blue">}</span><span class="yellow">Orders</pan></h1>


	@if(count($order)===0)
		<h1 class="yellow">There are no Orders as of the moment <span class="blue">:(</span></h1>
	@else
	<table class="container">
		<thead>
			<tr>
				<th><h1>Order</h1></th>
				<th><h1>Action</h1></th>
			</tr>
		</thead>
		<tbody>
			@foreach($order as $orders)
			<tr>
				<td>{{$orders->order_id}}</td>
				<td>
					<a data-toggle="modal" href="" data-target="#detailsModal{{$orders->order_id}}" class="btn-get-started">View Details</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif

@foreach($order as $order_m)
<div class="modal fade" id="detailsModal{{$order_m->order_id}}" tabindex="-1" role="dialog" aria-labelledby="detailsModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Label2">Order Number echobravo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <textarea name="pml_order" rows="16" style="font-size: 15px;" class="form-control"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 
@endforeach
@endsection

