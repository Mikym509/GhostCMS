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
        <div class="col-sm-12" style="text-align:center;padding-top:2%">
            <img src="{{asset('images/titles/GhostPro_logo.png')}}" width="25%" class="imgGhostPro">
            <h3 style="padding-top:2%;font-size:5.5vmin;font-weight:bold;">First, create an account.</h3>
            <p style="color:#8F8F8F;font-size:2.5vmin;">You’ll get an unlimited, free 14-day trial of all features.</p>
            <form id="register" method="post" action="{{ route('auth.Save') }}">

                    @if(Session::get('Fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('Fail') }}
                        </div>
                    @endif

                @csrf

                    <div class="row" >
                        <div class="col-sm-3"></div>
                        <div class="cols col-sm-6">
                            <label for="name" class="labelFormEdit">Name</label> <br>
                            <input type="text" name="name" class="inputForm" placeholder="example" value="{{ old('name') }}">
                            <span class="text-danger">
                            @error('name')
                                {{ $message }}
                                @enderror
                        </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="cols col-sm-6">
                            <label for="name" class="labelFormEdit">Surname</label> <br>
                            <input type="text" name="surname" class="inputForm" placeholder="example" value="{{ old('surname') }}">
                            <span class="text-danger">
                            @error('surname')
                                {{ $message }}
                                @enderror
                        </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="cols col-sm-6">
                            <label for="username" class="labelFormEdit">Username</label> <br>
                            <input type="text" name="username" class="inputForm" placeholder="example123" value="{{ old('username') }}">
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
                            <label for="email" class="labelFormEdit">Email</label> <br>
                            <input type="text" name="email" class="inputForm" placeholder="jamie@example.com" value="{{ old('email') }}">
                            <span class="text-danger">
                            @error('email')
                                {{ $message }}
                                @enderror
                        </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="cols col-sm-6">
                            <label for="Password" class="labelFormEdit">Password</label> <br>
                            <input type="password" name="password" class="inputForm" placeholder="password">
                            <span class="text-danger">
                            @error('password')
                                {{ $message }}
                                @enderror
                        </span>
                            <p style="position:absolute;left:19%;font-size:2vmin;color:#A2A2A2">At least 10 characters, but more is fine too</p>
                        </div>
                    </div>

                    <div class="row" style="margin-top:1%">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6" style="text-align:center">
                            <div class="form-group">
                                <input type="submit" class="btnSign" name="btnSign" value="Continue ->">
                            </div>
                            <p style="padding-top:3%;font-size:2.5vmin;color:#A2A2A2">Already have an account? <br>
                                <a href="{{ route('auth.Login') }}" style="color: black;font-size: 3vmin;">Login in to Ghost</a>
                            </p>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
