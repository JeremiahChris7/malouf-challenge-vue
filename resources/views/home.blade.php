<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Laravel Pagination Examle</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="app.css">
    </head>

    <body>
        <div class="container mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <th scope="row">{{ $customer->id }}</th>
                        <td>{{ $customer->first_name . " " . $customer->last_name }}</td>
                        <td><button class="btn btn-default">view</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
