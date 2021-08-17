<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Order {{ $order->id }}</title>

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
            <a class="nav-item" href="{{ url('customer/'.$customer->id) }}">Back to customer</a>
            <div class="card my-card order-card">
                <div class="card-header">
                    <h1>Order {{ $order->id }}</h1>
                </div>
                <div class="card-body">
                    <div>
                        <h2 class="card-title">Order Date</h2>
                        <p class="card-text">{{ date('F j, Y', strtotime($order->order_date)) }}</p>
                        <h2 class="card-title">Status</h2>
                        <p class="card-text">{{ ucFirst($order->order_status) }}</p>
                        <h2 class="card-title">Customer</h2>
                        <p class="card-text">{{ $customer->first_name }} {{ $customer->last_name }}</p>
                        <h2 class="card-title">Shipping Address</h2>
                        <p class="card-text">{{ $order->shipping_address }} </p>
                        <h2 class="card-title">Total Value</h2>
                        <p class="card-text">${{ $order->total_value }} </p>
                    </div>
                    <a class="btn btn-secondary cancel-btn" href="{{ url('cancel-order/'.$order->id) }}" role="button"
                        onclick="return confirm('Are you sure you want to cancel this order?')">Cancel</a>
                </div>
                <div class="card-footer">
                    <h2>Products</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">Product Number</th>
                                <th scope="col">Product</th>
                                <th scope="col">Total Value</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderProducts as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>${{ $product->price }}
                                </td>
                                <td>
                                    <a class="btn btn-danger"
                                        href="{{ route('remove-product',['orderId'=>$order->id,'pivotId'=>$product->pivot->id])}}"
                                        onclick="return confirm('Are you sure you want to remove this product?')">Remove</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary right" data-toggle="modal"
                        data-target="#exampleModal">Add Product</button>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Products</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="table-primary">
                                        <th scope="col">#</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
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
                                            <a class="btn btn-primary right"
                                                href="{{ route('add-product',['orderId'=>$order->id, 'productId'=>$product->id]) }}">Add</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
