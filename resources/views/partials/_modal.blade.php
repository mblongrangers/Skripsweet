<div class="modal" tabindex="-1" role="dialog" id="div{{ $product->id }}modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $product->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <img class="card-img-top" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
          </div>
          <form action="{{ route('add-to-cart') }}" method="POST">
            @csrf
            <div class="col-md-8">
              <p>Qty : <input type="number" class="form-control {{ $errors->has('qty') ? 'is-invalid' : ''}}" name="qty" min="1" max="{{ $product->quantity }}" id="qty_{{ $product->id }}" value="1"></p>
              {!! $errors->first('qty', '<span class="invalid-feedback">:message</span>') !!}
              <p>Stock : {{ number_format($product->quantity) }}</p>
              <p>Price : Rp. {{ number_format($product->price) }}</p>
              <p>Sub Total : <strong id="sub_total_{{ $product->id }}"></strong></p>
              <input type="hidden" name="product_id" value="{{ $product->id }}">
            </div>
          </div>
          @if ($product->quantity > 0)
            <button type="submit" button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 class="btn btn-primary pull-right ">Add To Chart</button>
            </form>
          @endif
      </div>
    </div>
  </div>
</div>

@push('js')
  <script>
    $(document).ready(function () {
      var price = `{{ $product->price }}`;
      $(`#qty_{{ $product->id }}`).on('input', function () {
        $(`#sub_total_{{ $product->id }}`).html(price * $(`#qty_{{ $product->id }}`).val());
      });
    });
  </script>
@endpush