<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" content="Michele Mammucari">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    <title>Ghost</title>
</head>
<body class="createPostPage">

<video autoplay muted loop id="myVideo">
    <source src="{{ asset('/images/media/Video.mp4') }}" type="video/mp4">
    Your browser does not support HTML5 video.
</video>

<div class="container" >
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="addImage col-sm-6">
            <h1 style="text-align:center;font-weight:bold">Add an image </h1>
            <form action="{{ route('gallery.Upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="user_id" value="{{ $LoggedUserInfo['id'] }}" style="display: none"> <br>

                <input type="text" name="title" placeholder="Title..." class="inputFormPost" value="{{ old('title') }}"> <br>
                <span class="text-danger"> @error('title'){{ $message }} @enderror</span> <br>

                <div class="inputFormPost2">
                    <input type="file" id="image" name="image" class="file" value="{{ old('image') }}">
                    <label for="image" class="labelFile">Select a file</label> <br>
                    <span class="text-danger"> @error('image'){{ $message }} @enderror</span>
                </div>
                <div>
                    <input type="submit" class="btnPost" name="btnSign" value="ADD" style="font-weight: bold;">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
