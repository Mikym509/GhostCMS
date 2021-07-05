<x-layout>
    <x-slot name="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="titleWelcome">Dashboard</h1>
                    @if(Session::get('Success'))
                        <div class="Welcome">
                            {{ Session::get('Success') }}
                        </div>
                    @endif
                </div>
            </div>
            <h3 class="titleWelcomePage">Start creating content</h3>
            <div class="row">
                <div class="col-md-8" style="margin-top:5%;">
                    <div class="row" style="border: 1px solid #E1E1E1;padding:3%">
                        <div class="col-sm">
                            <p class="text"> <img src="{{ asset('images/icon_and_Images/members.png') }}" class="imgMembers" > <a href="" class="titleLink">Create your first member</a><br> <span class="spanText"> Add yourself or import members from CSV</span> </p>
                        </div>
                        <div class="col-sm">
                            <p class="text"> <img src="{{ asset('images/sideNav/post.png') }}" class="imgMembers" style="background-color: #00FF00;"> <a href="/blog/create" class="titleLink">Publish a post</a> <br> <span class="spanText"> Get familiar with the Ghost editor and start creating</span> </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <table class="tableMembers">
                        <tr>
                            <th class="membersTitle">TOP MEMBERS</th>
                        </tr>
                        @foreach($utenti->take(5) as $utente)
                            <tr style="width: 100%;padding: 5px; height:100%">
                                <td style="font-size:2vmin;font-weight:bold;"> <img src="{{ asset('images/icon_and_Images/profile.png') }}" width="10%"> <span style="text-align:center;padding-top:1%"> {{ $utente->name." ".$utente->surname }} </span> </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row " style="padding-top: 5%;">
                <div class="col-sm-4" style="border: 0.2px solid #E1E1E1;">
                    <h5 class="titleParagraph">Customite your site design</h5>
                    <p class="textParagraph">Stand out from the crowd.Ghost lets your customize everything so you can create a pubblication that doesn't just look the same as what everyone else has.</p>
                    <div class="btn-group">
                        <a href="#" class="btn btn-light" role="button" aria-pressed="true">Brand settings</a>
                        <a href="#" class="btn btn-light" role="button" aria-pressed="true">Email settings</a>
                        <a href="#" class="btn btn-light" role="button" aria-pressed="true">Your theme</a>
                    </div>
                </div>
                <div class="col-sm-4" style="border: 0.2px solid #E1E1E1; padding-bottom:1%">
                    <h5 class="titleParagraph">Looking for help with Ghost features?</h5>
                    <p class="textParagraph">Our product knowledge is packed full of guides,tutorials,answers to frequently asked questions, tips for dealing with common errors,and much more.</p>
                    <a href="https://ghost.org/help/" class="btn btn-light" role="button" aria-pressed="true">Visit the help center -></a>
                </div>
            </div>
            <div class="row" style="padding-top: 5%;">
                <div class="col-sm-4" style="border: 0.2px solid #E1E1E1;">
                    <h5 class="titleParagraph"> How to start a successfull memmbership business without a huge audience</h5>
                    <p class="textParagraph">You can gain serious momentum with your membership business--even with a smaller audience. Find your first 100 true fans,cultivate them, and build a fulfilling and thriving premium community.</p>
                </div>
                <div class="col-sm-4" style="border: 0.2px solid #E1E1E1;">
                    <img src="{{ asset('images/icon_and_Images/behindTheMac.webp') }}" width="100%">
                </div>
            </div>
            <div class="row" style="padding-top: 5%;">
                <div class="col-sm-4" style="border: 0.2px solid #E1E1E1;">
                    <img src="{{ asset('images/icon_and_Images/CecilyFb2.png') }}" width="100%">
                </div>
                <div class="col-sm-4" style="border: 0.2px solid #E1E1E1;">
                    <h5 class="titleParagraph"> Discover writing worth reading.</h5>
                    <p class="textParagraph">Looking for inspiration to build a paid publication and newsletter with tens of thousands of subscribers?The Browser is one of the most successful sites running on Ghost, giving people interesting things to ponder and fascinating ideas to discuss at dinner.</p>
                </div>
            </div>
            <div class="row" style="padding-top: 5%;">
                <div class="col-sm-4" style="border: 0.2px solid #E1E1E1;">
                    <h5 class="titleParagraph"> The unexpected (but proven) way to find your niche in the creator economy</h5>
                    <p class="textParagraph"> Niche = focus. If you’re struggling to find your angle, chances are you’re closer than you think. When you do find your niche, it will practically feel like cheating.</p>
                </div>
                <div class="col-sm-4" style="border: 0.2px solid #E1E1E1;">
                    <img src="{{ asset('images/icon_and_Images/find-your-niche.jpg') }}" width="100%">
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
