<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Order #{{ $order->id }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <a href="{{ url('') }}">Home</a>
            <a href="{{ url('customer/'.$customer->id) }}" style="margin-left: 20px;">Back to customer page</a>
            <div class="card" style="width: 1200px; margin: 50px auto;">
                <div class="card-header">
                    <h1 style="font-size: 30px;">Order #{{ $order->id }}</h1>
                </div>
                <div class="card-body">
                    <div style="float: left;">
                        <h2 class="card-title" style="font-size: 25px;">Status</h2>
                        <p class="card-text">{{ ucFirst($order->order_status) }}</p>
                        <h2 class="card-title" style="font-size: 25px;">Customer</h2>
                        <p class="card-text">{{ $customer->first_name }} {{ $customer->last_name }}</p>
                        <h2 class="card-title" style="font-size: 25px;">Shipping Address</h2>
                        <p class="card-text">{{ $order->shipping_address }} </p>
                    </div>
                    <a class="btn btn-primary" href="{{ url('cancel-order/'.$order->id) }}" role="button" onclick="return confirm('Are you sure you want to cancel this order?')" style="float: right; margin-top: 190px;">Cancel</a>
                </div>
                <div class="card-footer">
                    <h2 style="font-size: 25px;">Products</h2>
                    <table class="table table-bordered" style="border-radius: .25rem;">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">#</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col">Total Value</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>${{ $product->price }}
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ url('product/'.$product->id) }}" role="button">Remove</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
