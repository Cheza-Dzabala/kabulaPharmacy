<!-- Stock Config modal -->
<div id="stockConfigModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Stock Configurations</h6>
            </div>

            <div class="modal-body">
              <a href="{{ route('stock-dpt-config') }}"><span class="text-default">Pharmacy Departments</span></a>
                <hr>
              <a href="{{ route('stock-tax-config') }}"><span class="text-default">Tax Profiles</span></a>
                <hr>
              <a href="{{ route('stock-generic-names') }}"><span class="text-default">Generic Names</span></a>
                <hr>
                <a href="{{ route('stock-types') }}"><span class="text-default">Stock Types</span></a>
                <hr>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /Stock Config modal -->
