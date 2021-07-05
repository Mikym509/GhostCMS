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
<div class="divMidPage">
    <div class="topnav">
        <a href="#home">HOME</a>
        <a href="#news">TAG</a>
        <a href="#contact">AUTHOR</a>
        <a href="#about">HELP</a>
    </div>
    <div class="divImage">
        <img src='/images/icon_and_Images/lightLogo.png' width="55%" >
        <h2 style="color:#E1E1E1">Install Ghost CMS in MacOS</h2>
    </div>
</div>
<div class="container" style="margin-top:5%;">
    <div class="row justify-content-center">
        <div class="col-sm">
            <img src="/images/icon_and_Images/imageGhost.png" width="90%">
        </div>
        <div class="col-sm-4">
            <h3>Install Ghost CMS in MacOS</h3>
            <p>Welcome, it's great to have you here. We know that first impressions are important, so we've populated your new site with some initial getting started posts that will help you get familiar with everything in no time.</p>
        </div>
    </div>
    <div class="row justify-content-center" style="margin-top:5%;">
        <div class="col-sm-4">
            <img src="/images/icon_and_Images/publishing-options.png" width="100%"> <br>
            <p> <h4 class="ttl">Customizing your brand and design settings</h4>How to tweak a few settings in Ghost to transform your site from a generic template to a custom brand with style and personality.</p>
        </div>
        <div class="col-sm-4">
            <img src="/images/icon_and_Images/writing-posts-with-ghost.png" width="100%"> <br>
            <p> <h4 class="ttl">Writing and managing content in Ghost, an advanced guide</h4>A full overview of all the features built into the Ghost editor, including powerful workflow automations to speed up your creative process.</p>
        </div>
        <div class="col-sm-4">
            <img src="/images/icon_and_Images/creating-a-custom-theme.png" width="100%"> <br>
            <p> <h4 class="ttl">Building your audience with subscriber signups</h4>How Ghost allows you to turn anonymous readers into an audience of active subscribers, so you know what's working and what isn't.</p>
        </div>
    </div>
    <div class="row justify-content-center" style="margin-top:5%;">
        <div class="col-sm-4">
            <img src="/images/icon_and_Images/organizing-your-content.png" width="100%"> <br>
            <p> <h4 class="ttl">Selling premium memberships with recurring revenue</h4> For creators and aspiring entrepreneurs looking to generate a sustainable recurring revenue stream from their creative work, Ghost has built-in payments allowing you to create a subscription commerce business.</p>
        </div>
        <div class="col-sm-4">
            <img src="/images/icon_and_Images/admin-settings.png" width="100%"> <br>
            <p> <h4 class="ttl">How to grow your business around an audience</h4>A guide to collaborating with other staff users to publish, and some resources to help you with the next steps of growing your business</p>
        </div>
        <div class="col-sm-4">
            <img src="/images/icon_and_Images/app-integrations.png" width="100%"> <br>
            <p> <h4 class="ttl">Setting up apps and custom integrations</h4>Work with all your favorite apps and tools or create your own custom integrations using the Ghost API.</p>
        </div>
    </div>
</div>
</body>
</html>
