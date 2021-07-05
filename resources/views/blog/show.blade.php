<x-layout>
    <x-slot name="main">
        <h1>Your post</h1>
        <div class="contPost container">
            <div class="rowPost row">

                <div class="col-md-4">
                    <h3>{{ $post->title }}</h3>
                </div>

                @if($LoggedUserInfo -> id == $post->user->id)
                    <div class="col-md-2 ml-auto" style="text-align:right">
                        <div class="dropdown2">
                            <button class="dropbtn2"> Settings </button>
                            <div class="dropdown-content2">
                                <a href="/blog/{{ $post->slug }}/edit">Edit</a>
                                <form method="post" action="/blog/{{ $post->slug }}/delete" style="text-align: center;">
                                    @csrf
                                    <button type="submit" class="btnDelete">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
            <div class="row">
                    @if( $post->image_path == 'null')
                    <div class="col-sm-12">
                        <h5>Type of post: <span style="font-weight: bold">{{ $post->type }}</span></h5>
                        <h5>Tag:<span style="font-weight: bold">{{ $post->tag }}</span> </h5>
                        <h5>Category:<span style="font-weight: bold">{{ $post->category->name }}</span></h5>
                        <p>{{ $post->description }}</p>
                    </div>
                @else
                    <div class="col-sm-6">
                        <figure>
                                <img src="{{ asset('/images/uploadImages/' . $post->image_path) }}" width="100%">
                            <figcaption style="margin-top:2%;">
                                <span class="subDescriptionPost">
                                    By
                                    <span class="subDescriptionPostUser">
                                        {{ $post->user->name." ".$post->user->surname }},
                                    </span> Created on {{ date('jS M Y',strtotime($post->updated_at)) }}
                                </span>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-sm-4">
                        <h5>Type of post: <span style="font-weight: bold">{{ $post->type }}</span></h5>
                        <h5>Tag:<span style="font-weight: bold">{{ $post->tag }}</span> </h5>
                        <h5>Category:<span style="font-weight: bold">{{ $post->category->name }}</span></h5>
                        <p>{{ $post->description }}</p>
                    </div>
                @endif
            </div>
        </div>
    </x-slot>
</x-layout>

