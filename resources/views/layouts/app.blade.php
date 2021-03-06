<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @yield('meta')

            <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        .productListSingle .col-xs-12 {
            margin: 20px 0px;
        }

        .productListSingle .media .media-left {
            min-width: 200px;
        }
        .totalAmountArea .checkBtnArea {
            display: block;
            float: left;
            padding: 20px 30px;
            width: 100%;
            border-left: 5px solid #f0f0f0;
            border-right: 5px solid #f0f0f0;
            border-bottom: 3px solid #f0f0f0;
        }

    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Laravel
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/products') }}">All Products</a></li>
                <li><a href="{{ url('/cart') }}">Your Cart</a></li>
                <li><a href="{{ url('/orders') }}">Your Orders</a></li>
                @can('create',new App\Product())
                <li><a href="" data-toggle="modal" data-target="#addNewProduct">Add New Product</a></li>
                <!-- Button trigger modal -->
                {{--<li><button type="button" class="btn btn-default"  title="Add a new product" data-toggle="modal" data-target="#addNewProduct">--}}
                {{--Add New Product--}}
                {{--</button>--}}
                {{--</li>--}}
                @endcan


                {{--@can('create-product')--}}
                {{--<li><a href="{{url('/products/create')}}" >Add New Product</a></li>--}}
                {{--@endcan--}}

                {{--@if(Auth::check()&&Auth::user()->level_id<3)--}}
                {{----}}
                {{--@endif--}}
                @can('create', new \App\Order())
                <li><a href="{{url('/products/create')}}">create Product</a></li>
                @endcan
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>

                @else
                    <button type="button" class="btn btn-default" data-toggle="dropdown">
                        {{Auth::user()->name}}
                        <span class="caret"></span>

                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/cart') }}"><i class=""></i>Your Cart</a></li>
                        <li><a href="{{ url('/orders') }}"><i class=""></i>Your Order</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                    </ul>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')


        <!-- Modal -->
<div class="modal fade" id="addNewProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Product</h4>
            </div>
            {!! Form::open(['url'=>'/products','method'=>'POST','files'=>true]) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        {!! Form::label('product_title', 'Enter Product Title')!!}
                        {!! Form::text ('product_title',null,['class'=>'form-control','placeholder'=>'Enter product title here']) !!}
                        <br>
                        {!! Form::label('product_description', 'Enter Product Description')!!}
                        {!! Form::text ('product_description',null,['class'=>'form-control','placeholder'=>'Enter product description here']) !!}
                        <br>
                        {!! Form::label('product_price', 'Enter Product Price')!!}
                        {!! Form::number ('product_price',null,['class'=>'form-control','placeholder'=>'Enter product price here']) !!}
                        <br>
                    </div>
                    <div class="col-md-6">
                        <br>
                        {!! Form::label('seller_id', 'Enter Seller Id')!!}
                        {!! Form::number ('product_sellerid',null,['class'=>'form-control','placeholder'=>'Enter Product seller id here']) !!}
                        <br>
                        {!! Form::label('seller_name', 'Enter Seller Name')!!}
                        {!! Form::text ('product_sellername',null,['class'=>'form-control','placeholder'=>'Enter Product seller name here']) !!}
                        <br>
                        {!! Form::label('product_image', 'Upload Product Image')!!}
                        {!! Form::file('product_image') !!}<br>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit('Add Product' ,['class'=>'btn btn-default','data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Add New Product'])!!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
        integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

@yield('scripts')
</body>
</html>
