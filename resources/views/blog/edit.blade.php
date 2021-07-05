<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" content="Michele Mammucari">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    <link rel = "icon" href = "{{ asset('/images/sideNav/ghost.png')  }}" type = "image/x-icon">
    <title>Ghost</title>
</head>
<body style="background-color: white;">

<video autoplay muted loop id="myVideo">
    <source src="{{ asset('/images/media/Video.mp4') }}" type="video/mp4">
    Your browser does not support HTML5 video.
</video>

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="colForm col-sm-6">
            <a href="/dashboard" class="comeBack">
                <h1 style="font-weight:bold"> <img src="{{ asset('/images/sideNav/ghost.png') }}" style="width:10%"> Edit your post </h1>
            </a>
            <form action="/blog/{{ $post->slug }}/update" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="user_id" value="{{ $LoggedUserInfo['id'] }}" style="display: none"> <br>

                <input type="text" name="title" value="{{$post->title}}" class="inputFormPost" value="{{ old('title') }}"> <br>
                <span class="text-danger">
                @error('title')
                    {{ $message }}
                    @enderror
            </span>

                <input type="text" name="tag" value="{{ $post->tag }}" placeholder="Tag..." class="inputFormPost" value="{{ old('tag')}}"> <br>
                <span class="text-danger">
                @error('tag')
                    {{ $message }}
                    @enderror
            </span>

                <select name="category" id="category" class="btnCategory" value="">
                    <option value="">Select a category:</option>
                    @foreach($category as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('category')
                    {{ $message }}
                    @enderror
                </span>

                <textarea name="description" placeholder="Description..." class="inputFormPostDesc" value{{ old('description') }}> {{ $post->description }}</textarea> <br>
                <span class="text-danger">
                    @error('description')
                    {{ $message }}
                    @enderror
                </span>

                <select id="imageGallery" name="imageGallery" class="btnGallery">
                    <option value="null">Choose an image from gallery</option>
                    @foreach($gallery as $image)
                        @if($LoggedUserInfo['id'] == $image->user_id)
                            <option value="{{ $image->image_path }}">{{ $image->title }}</option>
                        @endif
                    @endforeach
                </select> <br>

                <select id="type" name="type" class="btnType" >
                    <option value="">Type of your post</option>
                    <option value="Draft">Draft</option>
                    <option value="Scheduled">Scheduled</option>
                    <option value="Published">Published</option>
                </select> <br>
                <span class="text-danger">
                    @error('type')
                        {{ $message }}
                    @enderror
                </span> <br>

                <div class="inputFormPost2">
                    <input type="file" id="image" name="image" class="file" value="{{ old('image') }}">
                    <label for="image" class="labelFile">Select a file</label> <br>
                    <span class="text-danger">
                    @error('image')
                        {{ $message }}
                        @enderror
                </span>
                </div>
                <div>
                    <input type="submit" class="btnPost" name="btnSign" value="SUBMIT POST" style="font-weight: bold;">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
