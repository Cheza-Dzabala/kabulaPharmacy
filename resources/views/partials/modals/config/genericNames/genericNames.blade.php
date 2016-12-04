<!-- Tax Profile modal -->
<div id="newGenericName" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-teal">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Generic Name</h6>
            </div>
            <form action="{{ route('save-generic-names') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Generic Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Generic Name"/>

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
