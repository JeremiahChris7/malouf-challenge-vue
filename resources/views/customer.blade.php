<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Customer {{$customer->id}}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Malouf Challenge</a>
    </nav>
    <div class="container">
        <div class="row">
            <div class="card my-card">
                <div class="card-header">
                    <h1>Customer {{ $customer->id }}</h1>
                </div>
                <div class="card-body">
                    <p class="cust-name">{{ $customer->fullName() }}</p>
                    <h2 class="card-title">Email</h2>
                    <p class="card-text">{{ $customer->email }} </p>
                    <h2 class="card-title">Phone</h2>
                    <p class="card-text">{{ $customer->phone_number }}</p>
                    <h2 class="card-title">Address</h2>
                    <p class="card-text">${{ $customer->address }} </p>
                </div>
                <div class="card-footer">
                    <h2>Orders</h2>
                    @if( !$orders->isEmpty() )
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">Order Number</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Total Value</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td class="cell-first">{{ $order->id }}</th>
                                <td>{{ date('F j, Y', strtotime($order->order_date)) }}</td>
                                <td>${{ $order->total_value }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ url('order/'.$order->id) }}"
                                        role="button">View</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="{{ url('cancel-order/'.$order->id) }}" role="button" onclick="return confirm('Are you sure you want to cancel this order?')">Cancel</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h3 class="orders-note">-- No Orders --</h3>
                    @endif
                </div>
            </div>

        </div>
    </div>
</body>

</html>
