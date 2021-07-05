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
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="titleWelcome"> Posts {{ $title }}</h1>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-2">
                <a href="/blog/create" class="newPostBtn">New post</a>
            </div>
        </div>

        @if(session()->has('message'))
            <div>
                <p>
                    {{ session()->get('message')}}
                </p>
            </div>
        @endif
        <div class="row" style="margin-top:2%;">
            <div class="col-sm"></div>
            <div class="col-2">
                <div class="dropdown">
                    <button class="dropbtn">All posts</button>
                    <div class="dropdown-content">
                        <a href="/posts" style="font-weight:bold">All posts</a>
                        <a href="/drafts">Draft posts</a>
                        <a href="/published">Published posts</a>
                        <a href="/scheduled">Schedule posts</a>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="dropdown">
                    <button class="dropbtn">All access</button>
                    <div class="dropdown-content">
                        <a href="#" style="font-weight:bold">All access</a>
                        <a href="#">public</a>
                        <a href="#">Members-only</a>
                        <a href="#">Paid members-only</a>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="dropdown">
                    <button class="dropbtn">All authors</button>
                    <div class="dropdown-content">
                        <a href="#" style="font-weight:bold">All authors</a>
                        <a href=""> {{ $LoggedUserInfo['name']." ".$LoggedUserInfo['surname']}}</a>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="dropdown">
                    <button class="dropbtn">All tags</button>
                    <div class="dropdown-content">
                        <a href="#" style="font-weight:bold">All tags</a>
                        @foreach ($posts as $post)
                            @if($post->type == 'Published')
                            <a href="#">{{ $post->tag }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="dropdown">
                    <button class="dropbtn">Your categories</button>
                    <div class="dropdown-content">
                        <a href="#" style="font-weight:bold">All categories</a>
                        @foreach ($yourCategory as $category)
                            @if($LoggedUserInfo->id == $category->id)
                            <a href="#">{{ $category->name }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="table" id="table">
            {{ $table }}
        </div>
    </div>
</body>
</html>
