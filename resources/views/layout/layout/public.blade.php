<!DOCTYPE html>
<html>
    <head>
        <title>Equity Manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/app.css" />

        <link rel="apple-touch-icon" sizes="57x57" href="/images/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/images/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/images/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/images/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/images/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/images/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/images/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="/images/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/images/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">             
        
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body>
      <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-default header-menu">
                <div class="container-fluid navbar-header">
                    <a class="navbar-brand" href="/">
                        <img src="/images/equity-manager-logo.png" alt="Equity Manager">
                        <span class="vertical-image-align-helper"></span>
                    </a>
                </div><!-- /.container-fluid -->
            </nav>            
        </div>
        <div class="row">            
            @yield('content')    
            <div class="col-md-5 col-md-offset-3">
                @include('layout.partial._flash')
                @include('layout.partial._errors')
            </div>
            
       </div>
      </div>

    </body>
</html>

