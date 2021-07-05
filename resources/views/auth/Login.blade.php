<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" content="Michele Mammucari">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    <title>Ghost</title>
</head>
<div class="container">
    <div class="row">
        <div class="col-sm-12" style="text-align:center;">
            <img src="{{asset('images/titles/ghostLogo.png')}}" width="20%" class="imgGhostPro">
            <h3 style="padding-top:4%;font-size:5vmin;font-weight:bold;">Welcome back.</h3>
            <p style="color:#8F8F8F;font-size:2.5vmin;">Continue to your blog</p>
            <form id="login" method="post" action="{{ route('auth.Check') }}" style="padding-top: 0%">

                @if(Session::get('Success'))
                    <div class="alert alert-success">
                        {{ Session::get('Success') }}
                    </div>
                @endif

                @if(Session::get('Fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('Fail') }}
                    </div>
                @endif

                @csrf

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="cols col-sm-6">
                            <label for="username" class="labelFormEdit">Username</label> <br>
                            <input type="text" name="username" class="inputForm" value="{{ old('username') }}">
                            <span class="text-danger">
                            @error('username')
                                {{ $message }}
                                @enderror
                        </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="cols col-sm-6">
                            <label for="Password" class="labelFormEdit">Password</label> <br>
                            <input type="password" name="password" class="inputForm">
                            <span class="text-danger">
                            @error('password')
                                {{ $message }}
                                @enderror
                        </span>
                        </div>
                    </div>

                    <div class="row" style="margin-top:1%">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6" style="text-align:center">
                            <div class="form-group" style="padding-top:5%">
                                <input type="submit" class="btnSign" name="btnLogIn" value="Log in">
                            </div>
                            <p style="padding-top:3%;font-size:2.5vmin;color:#A2A2A2">Don't have an Ghost blog yet?<br>
                                <a href="{{ route('auth.Register') }}" style="color: black;font-size: 3vmin;">Get started here</a>
                            </p>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
