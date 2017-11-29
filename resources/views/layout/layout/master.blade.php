<!DOCTYPE html>
<html>
    <head>
        <title>Equity Manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500|Source+Sans+Pro" rel="stylesheet">

        @if (app()->isLocal())
            <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        @else
            <link rel="stylesheet" href="{{ elixir('css/app.css') }}" />
        @endif

        @include('layout.partial.favicons')

        <meta name="csrf-token" content="{{csrf_token()}}" />

        @include('layout.partial.script-vars')
    </head>

    <body id="app">
        @include('layout.partial.top-menu')

        <div id="wrapper" v-bind:class="[menu.main + '-toggled']">

            @include('layout.partial.left-sidebar')

            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        {!!Breadcrumbs::render()!!}

                        <h1>{{$page_title or ''}}</h1>

                        @include('layout.partial._flash')
                        @include('layout.partial._errors')

                        @yield('content')
                    </div>
                </div>
            </div>

            @include('layout.partial.right-sidebar')
            @include('layout.partial.side-drawer')

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
        
        @if (app()->isLocal())
            <script src="{{ asset('js/vendor.js') }}"></script>
            <script src="{{ asset('js/babel-polyfill.js')}}"></script>
            <script src="{{ asset('js/app.js') }}"></script>
        @else
            <script src="{{ elixir('js/vendor.js')}}"></script>
            <script src="{{ elixir('js/babel-polyfill.js')}}"></script>
            <script src="{{ elixir('js/app.js')}}"></script>
        @endif

        @yield('extra-scripts')

        @if(config()->get('app.debug'))
            <script type="text/javascript">
              document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
            </script>
        @endif

    </body>
</html>
