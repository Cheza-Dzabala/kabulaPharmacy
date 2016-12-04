<!-- Tax Profile modal -->
<div id="newTaxProfile" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-teal">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">New Tax Profile</h6>
            </div>
            <form action="{{ route('save-tax-profile') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>Profile Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Profile Name"/>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('taxablePercentage') ? ' has-error' : '' }}">
                            <label>Percentage Taxable:</label>
                            <input type="number" name="taxablePercentage" class="form-control" placeholder="Taxable Percentage"/>
                            @if ($errors->has('taxablePercentage'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('taxablePercentage') }}</strong>
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
