@extends('layouts/simple')
@section('content')
    <!-- checkout -->
    <div class="cart-items">
        <div class="container">
            <div class="dreamcrub">
                <ul class="breadcrumbs">
                    <li class="home">
                        <a href="/" title="Go to Home Page">Home</a>&nbsp;
                        <span>&gt;</span>
                    </li>
                    <li class="women">
                        Order Details
                    </li>
                </ul>
                <ul class="previous">
                    <li><a href="/orders">Back To Orders List Page</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <h2>Order Details </h2>
            <table class="table">
                <tbody>
                <tr>
                    <td colspan="2">
                        <h4 style="text-align: center;">Summery</h4>
                    </td>
                </tr>
                <tr>
                    <th>Order ID</th>
                    <td>{{ $order->getId() }}</td>
                </tr>
                <tr>
                    <th>Creation Date</th>
                    <td>{{ $order->getCreatedAt()->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <th>Total price</th>
                    <td>{{ $order->getTotal() / 100.0 }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $order->getStatus() }}</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4 style="text-align: center;">Item details</h4>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $order->getItems() as $i )
                            <tr>
                                <td>{{ $i->getProduct()->getName() }}</td>
                                <td>{{ $i->getQuantity() }}</td>
                                <td>{{ $i->getUnitPrice() / 100.0 }}</td>
                                <td>{{ $i->getTotal() / 100.0 }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- //checkout -->


@stop