@extends("layouts/simple")
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
                        Orders
                    </li>
                </ul>
                <ul class="previous">
                    <li><a href="/products">Continue Shopping</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <h2>MY ORDERS </h2>
            @if( $orders->count() <= 0 )
            <div>
                <h1>You do not have any orders yet!</h1>
            </div>
            @else
            <div  class="cart-gd">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Creation Date</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $o)
                    <tr>
                        <td>
                            <a href="/orders/{{$o->getId()}}">{{ $o->getId() }}</a>
                        </td>
                        <td>{{ $o->getCreatedAt()->format('Y-m-d') }}</td>
                        <td>{{ $o->getTotal() / 100.0 }}</td>
                        <td>{{ $o->getStatus() }}</td>
                        <td>
                            <form action="/orders/refund/{{$o->getId() }}" method="post">
                                <input type="submit" value="Refund"/>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>

    <!-- //checkout -->

@stop