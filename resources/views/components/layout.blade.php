<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Author" content="Michele Mammucari">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
        <link rel = "icon" href = "{{ asset('/images/sideNav/ghost.png')  }}" type = "image/x-icon">
        <title>Ghost</title>
    </head>
    <body>
        <div class="sideNav" id = "sideNav">
            <menu class = "listLinks" id="listLinks">
                <h4 class="title"> <img src="{{ asset('/images/sideNav/ghost.png') }}" class = "logo"> Ghost</h4>

                <div class="row">
                    <div class="col-sm-3">
                        <a href="/dashboard">
                            <img src=" {{ asset('images/sideNav/home.jpeg') }}" class = "homeLogo">
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a  href="/dashboard" class = "Link">Dashboard</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <a href="/site">
                            <img src="{{ asset('images/sideNav/viewSite.png') }}" class="viewSiteLogo">
                        </a>
                    </div>
                    <div class="col-sm-9">
                        <a href="/site" class="Link">View site</a> <a href="/YourSite"></a>
                        <a href="/YourSite"> <img src="{{ asset('/images/sideNav/share.png') }}" width=30px></a>
                    </div>
                </div>

                <div class="row" style="margin-top:40%">
                    <div class="col-sm-3">
                        <a href="/posts">
                            <img src="{{ asset('images/sideNav/post.png') }}" class="PostLogo">
                        </a>
                    </div>
                    <div class="col-sm-9">
                        <a href="/posts" class="Link">Posts</a>
                        <a href="/blog/create"> <img src="{{ asset('/images/sideNav/plus.png') }}" width=30px style="margin-left: 10%;margin-bottom: 5%" class="plusBtn"></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        <a class = "subLink" href="/drafts">Drafts</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        <a class = "subLink" href="/scheduled">Scheduled</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        <a class = "subLink" href="/published">Published</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        <a class = "subLink" href="/posts/category">Categories</a>
                    </div>
                </div>

                <div class="row" style="margin-top:40%">
                    <div class="col-sm-3">
                        <a href="/tags">
                            <img src="{{ asset('images/sideNav/tag.png') }}" class="tagLogo">
                        </a>
                    </div>
                    <div class="col-sm-8">
                        <a class = "Link" href="/tags"> Tags</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <a href="/gallery">
                            <img src="{{ asset('images/sideNav/gallery.png') }}" class="tagLogo">
                        </a>
                    </div>
                    <div class="col-sm-8">
                        <a class = "Link" href="/gallery">Gallery</a>
                    </div>
                </div>

                <div class="row" style="margin-top:50%">
                    <div class="col-sm-4">
                        <a href="/dashboard/{{ $LoggedUserInfo->username }}">
                            <img src="{{ asset('images/icon_and_Images/profile.png') }}" width="50%" class="dropbtn3">
                        </a>
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <a class="logoutClass" href="{{ route('auth.Logout') }}">Logout</a>
                    </div>
                </div>

            </menu>
        </div>
        <div class="main" id = "main">
            {{ $main }}
        </div>
    </body>
</html>
