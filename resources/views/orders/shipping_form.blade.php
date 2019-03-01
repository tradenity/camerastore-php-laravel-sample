<form id="shipping-method-form" action="/orders/shipping" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <ul>
        <li class="text-info">Shipping method: </li>
        <li>
            <select name="shipping_method">
                @foreach($shippingMethods as $sm)
                <option value="{{ $sm->getId() }}" >{{ $sm->getName() }}</option>
                @endforeach
            </select>
        </li>
    </ul>
    <p style="display: none;" id="shipping_error_message"></p>
    <input type="submit" value="Submit" />
</form>

