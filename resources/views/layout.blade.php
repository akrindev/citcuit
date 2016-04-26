<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="CitCuit is a mobile Twitter client, alternative of official mobile.twitter.com website. Secure, slim, fast, lightweight, no ads, no database and of course we're open-sourced! Built with Lumen by Laravel. Made with <3 in Indonesia.">
        <meta name="keywords" content="citcuit, twitter, mobile, client, indonesia, slim, fast, lightweight, no database, no ads, open source">
        <meta name="author" content="Dody Agung Saputro (hello@dodyagung.com)">
        <link rel="icon" href="{{ url('assets/img/favicon.png') }}" type="image/png" sizes="any" />
        <title>@yield('title') - CitCuit {{ env('APP_VERSION') }}</title>
        <link href="{{ url('assets/css/normalize.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/citcuit.css') }}" rel="stylesheet">
    </head>
    <body>
        <a id="top"></a>
        <!--header-->
        <header>
            @if (session('citcuit.oauth')) <a href="{{ url('user/' . session('citcuit.oauth.screen_name')) }}">{{ '@' . session('citcuit.oauth.screen_name') }}</a> - @endif CitCuit {{ env('APP_VERSION') }}
        </header>
        <!--nav-top-->
        <nav class="menu">
            @if (session('citcuit.oauth'))
            @include('api.@nav_top')
            @else
            @include('non_api.@nav_top')
            @endif
        </nav>
        <!--content-->
        <article>
            @if (session('citcuit.oauth') && env('ALERT_INFO'))
            @include('api.@alert')
            @endif
            @yield('content')    
        </article>
        <!--nav-bottom-->
        <nav class="menu">
            @if (session('citcuit.oauth'))
            @include('api.@nav_bottom')
            @else
            @include('non_api.@nav_bottom')
            @endif
        </nav>
        <!--footer-->
        <footer>
            @if(isset($rate))
            <div class="rate">
                <strong>Rate limit <a href="https://blog.twitter.com/2008/what-does-rate-limit-exceeded-mean-updated" target="_blank">[?]</a> :</strong>
                @foreach ($rate as $key => $value)
                <br />&bullet; {{ $key }} : {{ $value['remaining'] }} hit / {{ $value['reset'] }} min.
                @endforeach
            </div>
            <hr />
            @endif
            Made with &hearts; by <a href="{{ url('user/dodyags') }}">@dodyags</a>. We're <a href="https://github.com/dodyagung/CitCuit" target="_blank">open-sourced</a>. Join our <a href="{{ url('user/citcuit_in') }}">Twitter</a> and <a href="https://fb.me/citcuit.in">Facebook</a> to stay updated.
        </footer>
        <a id="bottom"></a>
    </body>
</html>