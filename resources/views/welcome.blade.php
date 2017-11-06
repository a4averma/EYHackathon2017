<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Compliance Monitor</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <style>
            body {
                font-family: 'Raleway', sans-serif;
            }
        </style>
    </head>
    <body>
        <nav class="navbar sticky-top navbar-dark bg-primary justify-content-around">
            <a href="/" class="navbar-brand">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
                Compliance Monitor
            </a>
            <a href="/refresh" class="btn btn-sm btn-outline-light my-2"><i class="fa fa-retweet" aria-hidden="true"></i> Reload</a>
            <form class="form-inline" method="post" action="{{ route('search') }}">
                <input class="form-control mr-sm-2" name="q" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                {{csrf_field()}}
            </form>
        </nav>

        <div>
            @if(!empty($query))
            <div class="jumbotron">
                <div class="container">

                    <h1 class="display-3">Keyword: {{$query}}</h1>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
            @endif
            <div class="container" style="padding: 100px">
                @foreach($laws as $law)
                    <h1 class="display-8" style="text-align: justify">{{ $law->title }} @if($law->has_seen == 0)<span class="badge badge-danger"> New</span>@endif</h1>
                    <a href="#" class="badge badge-dark">{{$law->date}}</a>
                    <span class="badge badge-info">{{$law->country}}</span>
                    <br>
                    <br>
                    <p class="lead" style="text-align: justify"><?=str_replace('\r\n', '', $law->summarize)?></p>
                    <a href="document/{{$law->id}}" class="btn btn-primary pull-right">More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    <br>
                    <br>
                    <br>
                    <hr>
                    <br>
                    <br>
                    <br>
                @endforeach
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</html>
