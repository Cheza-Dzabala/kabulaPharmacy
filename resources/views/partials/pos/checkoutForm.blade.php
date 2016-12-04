<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 8/30/16
 * Time: 6:42 PM
 */
        ?>

<form action="{{ route('posSubmit') }}" id="checkoutForm" method="post">
    {{ csrf_field() }}
<input type="hidden" name="amount" id="purchaseAmount" value="">
<input type="hidden" name="tenderedAmount" id="tenderedAmount" value="">
</form>
