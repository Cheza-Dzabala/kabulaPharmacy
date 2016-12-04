<!-- Tax Profile modal -->
<div id="newStockDepartment" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-teal">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">New Stock Department</h6>
            </div>
            <form action="{{ route('save-stock-department-config') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Department Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Department Name"/>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('departmentLabel') ? ' has-error' : '' }}">
                        <label>Department Labelto:</label>
                        <input type="text" name="departmentLabel" class="form-control" placeholder="Department Label"/>
                        @if ($errors->has('departmentLabel'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('departmentLabel') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label>Description:</label>
                        <textarea name="description" class="form-control" placeholder="Description"></textarea>
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
