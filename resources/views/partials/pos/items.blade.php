<div class="col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h6 class="panel-title">Items</h6>
            <div class="heading-elements">

            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="form-group" >
                    <label>Item:</label>
                    <select name="genericName" id="genericName" class="select"
                            onchange="changeItem(this.options[this.selectedIndex].text,
                                                 this.options[this.selectedIndex].getAttribute('price'),
                                                 this.options[this.selectedIndex].getAttribute('value')
                                     )"
                    >
                        <optgroup label="Items">
                            <option></option>
                            @foreach($stocks as $stock)
                                @if($stock->currentLevel > 0)
                                   <option price="{{ $stock->price }}"  value="{{ $stock->id }}">{{ $stock->brandName }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" placeholder="quantity" name="quantity" id='quantity' class="form-control">
                </div>
                <button class="btn btn-primary" onclick="addStock()">Add Item<i class="icon-plus-circle2 position-right"></i></button>
                <button class="btn btn-danger" onclick="">Clear<i class="icon-diff-removed position-right"></i></button>
            </div>
            <hr>
            <div class="row">
                <table class="table" id="stocksTable">
                    <thead>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                    </thead>
                    <tbody id="stockItems">

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sub Total: <span id="subTotal"></span></th>
                    </tr>
                    <tr>
                        <th>Taxes: </th>
                    </tr>
                    <tr>
                        <th>Total <span id="purchaseTotal"></span></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h6 class="panel-title" id="processNoteTitle">Notes</h6>
                <div class="heading-elements">

                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <p id="processResult">

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>