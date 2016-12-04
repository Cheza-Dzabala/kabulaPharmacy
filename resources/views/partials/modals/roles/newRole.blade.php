<!-- Tax Profile modal -->
<div id="newRole" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-teal">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">New Role</h6>
            </div>
            <form action="{{ route('config-roles.new') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group{{ $errors->has('role_name') ? ' has-error' : '' }}">
                        <label>Role Name</label>
                        <input type="tex" class="form-control" name="name">
                        @if ($errors->has('role_name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('role_name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                        <label>Display Name</label>
                        <input type="tex" class="form-control" name="display_name">
                        @if ($errors->has('display_name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </span>
                        @endif
                    </div>



                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label>Type</label>
                        <textarea name="description" class="form-control"></textarea>

                        @if ($errors->has('description'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
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
