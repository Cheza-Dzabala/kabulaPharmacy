<!-- Tax Profile modal -->
<div id="newStockType" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-teal">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">New Stock Type</h6>
            </div>
            <form action="{{ route('save-stock-types') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Type Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Profile Name"/>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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
