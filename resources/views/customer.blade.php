<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Customer #{{$customer->id}}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <a href="{{ url('') }}">Home</a>
            <div class="card" style="width: 1200px; margin: 50px auto;">
                <div class="card-body">
                <h1 style="font-size: 30px; margin-bottom: 20px;">{{ $customer->fullName() }}</h1>
                    <h2 class="card-title" style="font-size: 25px;">Phone:</h5>
                    <p class="card-text">{{ $customer->phone_number }}</p>
                    <h2 class="card-title" style="font-size: 25px;">Email:</h5>
                    <p class="card-text">{{ $customer->email }}</p>
                    <h2 class="card-title" style="font-size: 25px;">Address:</h5>
                    <p class="card-text">{{ $customer->address }} </p>
                </div>
                <div class="card-footer">
                    <h2 style="font-size: 25px;">Orders</h2>
                    @if( !$orders->isEmpty() )
                    <table class="table table-bordered" style="border-radius: .25rem;">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">#</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Total Value</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td style="width: 175px;">{{ $order->id }}</th>
                                <td>{{ date('F j, Y', strtotime($customer->order_date)) }}</td>
                                <td>${{ $order->total_value }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ url('order/'.$order->id) }}" role="button">View</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="{{ url('cancel-order/'.$order->id) }}" role="button" onclick="return confirm('Are you sure you want to cancel this order?')">Cancel</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h3 style="font-size: 20px; text-align: center; ">-- No Orders --</h3>
                    @endif
                </div>
            </div>

        </div>
    </div>
</body>

</html>
