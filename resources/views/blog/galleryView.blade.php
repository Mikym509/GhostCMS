<x-layout>
    <x-slot name="main">
        <div class="titleGallery">
            <div class="row">
                <div class="col-sm-4">
                    <h1 class="titleWelcome">Gallery</h1>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <a href="/gallery/add" class="newPostBtn">Add image</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="rowOwner row">
                <div class="col align-self-start"></div>
                <div class="col align-self-center"></div>
                <div class="col align-self-end" style="font-size: 2.5vmin;">
                    <span style="font-weight:bold">Owner: </span> <span style="font-size:2.5vmin">{{ $LoggedUserInfo->name." ".$LoggedUserInfo->surname }}</span>
                </div>
            </div>
            <div class="row">
                @foreach($images as $image)
                    @if ($LoggedUserInfo->id == $image->user_id)
                <div class="col-sm-6" style="margin-top:2%">
                    <div class="containerImages">
                        <img src="{{ asset('/images/uploadImages/'.$image->image_path) }}" alt="Avatar" class="image">
                        <div class="middle">
                            <div class="textTitleImageGallery">{{ $image->title }}</div>
                            <form method="post" action="/gallery/{{ $image->title }}/delete" style="text-align: center;">
                                @csrf
                                <button type="submit" class="btnDeleteGallery">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                    @endif
                @endforeach
            </div>
        </div>
    </x-slot>
</x-layout>
