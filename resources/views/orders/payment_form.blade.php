
<form id="payment-form" action="/orders/payment" method="post">
    <input type="hidden" name="payment_token" value="tk_xxxxx">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <ul>
        <li class="text-info">Card Holder Name: </li>
        <li><input id="card_holder_name" type="text" value="" /></li>
    </ul>
    <ul>
        <li class="text-info">Card Number: </li>
        <li><input id="card_number" type="text" value="4242424242424242" data-stripe="number"/></li>
    </ul>
    <ul>
        <li class="text-info">CVC: </li>
        <li><input id="cvc" type="text" value="123" data-stripe="cvc"/></li>
    </ul>
    <ul>
        <li class="text-info">Expiration Date: </li>
        <li>
            Month: <input type="text" value="12" style="width: 100px;" data-stripe="exp-month"/>
            Year: <input type="text" value="2019" style="width: 100px;" data-stripe="exp-year"/>
        </li>
    </ul>
    <p style="display: none;" id="card_error_message"></p>
    <input type="submit" value="PLACE ORDER" />
    <p class="click">By clicking this button, you are agree to shop  <a href="#">Policy Terms and Conditions.</a></p>
</form>
