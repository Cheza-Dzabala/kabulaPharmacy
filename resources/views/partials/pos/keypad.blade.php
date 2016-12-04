<div class="col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h6 class="panel-title">Check Out

            </h6>
            <div class="heading-elements">

            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <input type="text" class="form-control" id="moneyReceived" placeholder="Amount Received">
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <button class="btn bg-primary btn-block btn-float btn-sm" type="button" onclick="processNumbers('7')"><h2>7</h2></button>
                </div>

                <div class="col-md-4">
                    <button class="btn bg-primary btn-block btn-float btn-sm" type="button" onclick="processNumbers('8')"><h2>8</h2></button>
                </div>

                <div class="col-md-4">
                    <button class="btn bg-primary btn-block btn-float btn-sm" type="button" onclick="processNumbers('9')"><h2>9</h2></button>
                </div>
            </div>


            <div style="margin-top: 10px"></div>

            <div class="row">
                <div class="col-md-4">
                    <button class="btn bg-primary btn-block btn-float btn-sm" type="button" onclick="processNumbers('4')"><h2>4</h2></button>
                </div>

                <div class="col-md-4">
                    <button class="btn bg-primary btn-block btn-float btn-sm" type="button" onclick="processNumbers('5')"><h2>5</h2></button>
                </div>

                <div class="col-md-4">
                    <button class="btn bg-primary btn-block btn-float btn-sm" type="button" onclick="processNumbers('6')"><h2>6</h2></button>
                </div>
            </div>


            <div style="margin-top: 10px"></div>

            <div class="row">
                <div class="col-md-4">
                    <button class="btn bg-primary btn-block btn-float btn-sm" type="button" onclick="processNumbers('1')"><h2>1</h2></button>
                </div>

                <div class="col-md-4">
                    <button class="btn bg-primary btn-block btn-float btn-sm" type="button" onclick="processNumbers('2')"><h2>2</h2></button>
                </div>

                <div class="col-md-4">
                    <button class="btn bg-primary btn-block btn-float btn-sm" type="button" onclick="processNumbers('3')"><h2>3</h2></button>
                </div>
            </div>

            <div style="margin-top: 10px"></div>

            <div class="row">
                <div class="col-md-8">
                    <button class="btn bg-primary btn-block btn-float btn-sm" type="button" onclick="processNumbers('0')"><h2>0</h2></button>
                </div>

                <div class="col-md-4">
                    <button class="btn bg-primary btn-block btn-float btn-sm" type="button" onclick="processNumbers('.')"><h2>.</h2></button>
                </div>
            </div>
            <div style="margin-top: 10px"></div>
            <div class="row">
                <div class="col-md-6">
                    <button class="btn bg-teal-600 btn-block btn-float btn-sm" onclick="processPOS()" type="button">Process</button>
                </div>
                <div class="col-md-6">
                    <button class="btn bg-success btn-block btn-float btn-sm" type="button" id="checkOutBtn" onclick="checkout();" disabled>Checkout</button>
                </div>
            </div>
            <hr>
            <button class="btn bg-danger btn-block btn-float btn-sm" type="button" onclick="clearElement();">Clear</button>
        </div>
    </div>
</div>