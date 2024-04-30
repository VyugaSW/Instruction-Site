<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{csrf_token()}}">
        
        <title>Instructions - @yield('title')</title>

        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="https://kit.fontawesome.com/61baa7d2e2.js" crossorigin="anonymous"></script>
        
        <style>
            .hover-zoom img{
                transition: 0.8s;
            }

            .hover-zoom:hover img{
                transform: scale(1.04);
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        @include('layouts.header')

        <div class="d-flex flex-column" style="gap: 1.4rem">
            <div class="container">
                <div class="row" style="min-height: 70.5vh">
                    @yield('content')
                    @isset($error)
                        @include('modalwindows.notifications.modalwindow_errors',['errors' => [$error]])
                    @endif
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </body>
</html>