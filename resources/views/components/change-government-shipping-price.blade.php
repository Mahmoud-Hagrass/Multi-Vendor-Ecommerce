<div class="modal fade" id="changeGovernmentShippingPrice_{{ $governmentId }}" tabindex="-1" role="dialog" aria-labelledby="shippingPriceModalLabel_{{ $governmentId }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('admin.world.changeGovernmentShippingPrice') }}" method="POST">
      @csrf
      <input type="hidden" name="government_id" value="{{ $governmentId }}">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="shippingPriceModalLabel_{{ $governmentId }}">
            {{ __('dashboard.change_government_shipping_price') }}
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label for="shipping_price_{{ $governmentId }}">{{ __('dashboard.shippinng_price') }}</label>
            <input type="number"
                   class="form-control"
                   id="shipping_price_{{ $governmentId }}"
                   name="new_shipping_price"
                   placeholder="{{ __('dashboard.enter_new_shipping_price') }}"
                   step="1">
            @error('new_shipping_price')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">{{ __('dashboard.save') }}</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('dashboard.cancel') }}</button>
        </div>
      </div>
    </form>
  </div>
</div>
