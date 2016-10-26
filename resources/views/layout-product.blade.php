<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FoodPos</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        @yield('header')

    </head>
    <body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">                
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Dashboard</a></li>
                    <li><a href="{{ url('/products') }}">Product</a></li>
                    <li><a href="{{ url('/sales') }}">Sale</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-lg-2">
                <nav class="navbar navbar-default navbar-fixed-side">
                    <ul class="nav">
                    <!-- normal collapsible navbar markup -->
                        <li><a href="{{ url('/products/create') }}">Add Product</a></li>
                        <li><a href="{{ url('/products') }}">View Product</a></li>
                        </ul>
                </nav>
            </div>
            <div class="col-sm-9 col-lg-10">
            <!-- your page content -->
            <!-- main content -->
                <div class="container">
                 @yield('content')
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
 