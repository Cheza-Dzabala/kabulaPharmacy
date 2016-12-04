<!-- Tax Profile modal -->
<div id="new_product" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-teal">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">New Product</h6>
            </div>
            <form action="{{ route('products.save') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group{{ $errors->has('generic_name') ? ' has-error' : '' }}">
                        <label>Generic Name</label>
                        <select name="generic_name"  class="select form-control">
                            <optgroup>
                                @foreach($generic_names as $generic_name)
                                    <option value="{{ $generic_name->id }}">{{ $generic_name->name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @if ($errors->has('generic_name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('generic_name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                        <label>Type</label>
                        <select name="type"  class="select form-control">
                            <optgroup label="Types">
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @if ($errors->has('type'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('brand_name') ? ' has-error' : '' }}">
                        <label>Brand Name</label>
                        <input type="text" class="form-control" name="brand_name">

                        @if ($errors->has('brand_name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('brand_name') }}</strong>
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
