<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Author" content="Michele Mammucari">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <link type="text/javascript" src="{{asset('/js/dropdwonForm.js')}}">
        <link rel = "icon" href = "{{ asset('/images/sideNav/ghost.png')  }}" type = "image/x-icon">
        <title>Ghost</title>
</head>
<body class="createPostPage">

<video autoplay muted loop id="myVideo">
    <source src="{{ asset('/images/media/Video.mp4') }}" type="video/mp4">
    Your browser does not support HTML5 video.
</video>

    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="colForm col-sm-6">
                <a href="/dashboard" class="comeBack">
                    <h1 style="font-weight:bold"> <img src="{{ asset('/images/sideNav/ghost.png') }}" style="width:10%"> Create a post </h1>
                </a>
                    <form action="{{ route('blog.Store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="user_id" value="{{ $LoggedUserInfo['id'] }}" style="display: none;"> <br>

                        <input type="text" name="title" placeholder="Title..." class="inputFormPost" value="{{ old('title') }}">
                        <span class="text-danger">
                            @error('title')
                            {{ $message }}
                            @enderror
                        </span>

                        <input type="text" name="tag" placeholder="Tag..." class="inputFormPost" value="{{ old('tag')}}">
                        <span class="text-danger">
                            @error('tag')
                            {{ $message }}
                            @enderror
                        </span> <br>

                        <select name="category" id="category" class="btnCategory" value="{{ old('category') }}">
                            <option value="">Select a category:</option>
                            @foreach($yourCategory as $category)
                                @if($LoggedUserInfo->id == $category->id)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('category')
                            {{ $message }}
                            @enderror
                        </span>
                        <p style=" font-size:2.3vmin;color:#8F8F8F">The category is mandatory. If you don't have a category create it <a href="/posts/category" class="linkSubCategory">here</a></p>

                        <textarea name="description" placeholder="Description..." class="inputFormPostDesc" value{{ old('description') }}></textarea>
                        <span class="text-danger">
                            @error('description')
                            {{ $message }}
                            @enderror
                        </span> <br>

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
                        </span>

                        <div class="inputFormPost2" style="margin-top:5%;">
                            <input type="file" id="image" name="image" class="file" value="{{ old('image') }}">
                            <label for="image" class="labelFile">Select a file</label>
                            <span class="text-danger">
                                @error('image')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div style="text-align:center">
                            <input type="submit" class="btnPost" name="btnSign" value="SUBMIT POST">
                        </div>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>
