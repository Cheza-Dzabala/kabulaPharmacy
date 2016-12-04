<!-- Tax Profile modal -->
<div id="neworder" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-teal">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">New Order</h6>
            </div>
            <form action="{{ route('save_orders') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group{{ $errors->has('supplier') ? ' has-error' : '' }}">
                        <label>Supplier</label>
                        <select name="supplier"  class="select form-control">
                            <optgroup label="Orders">
                                @foreach($suppliers as $supplier)
                                   <option value="{{ $supplier->id }}">{{ $supplier->supplierName }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @if ($errors->has('supplier'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('supplier') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn bg-teal">Submit</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Tax Profile modal -->
