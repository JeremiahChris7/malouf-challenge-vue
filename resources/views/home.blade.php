<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Home</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="app.css">
    </head>

    <body>
        <div class="container mt-5">
            <a href="{{ url('') }}">Home</a>
            <h1>Customers</h1>
            <table class="table table-bordered" style="border-radius: .25rem;">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Number of orders</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td style="width: 175px;">{{ $customer->id }}</td>
                        <td style="width: 500px;">{{ $customer->first_name . " " . $customer->last_name }}</td>
                        <td>{{ $customer->numOrders() }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('customer/'.$customer->id) }}" role="button">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {!! $customers->links() !!}
            </div>
        </div>
    </body>
</html>
