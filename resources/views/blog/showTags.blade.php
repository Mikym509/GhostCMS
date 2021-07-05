<x-layout>
    <x-slot name="main">
        <x-features>
            @slot('title')
                > Tags
            @endslot
            <x-slot name="table">
                <div class="row justify-content-md-center" >
                        <div class="col-sm-12">
                            <table class="tablePosts">
                                <tr class="titleTabPosts">
                                    <th>TITLE</th>
                                    <th style="text-align:center">STATUS</th>
                                </tr>
                                @foreach($posts as $post)
                                    @if($post->type == 'Published')
                                    <tr class="dataTabPosts">
                                        <td>
                                            <a  href="/blog/{{ $post->slug }}"  class="tagTitlePost">
                                                {{ $post->title }}
                                            </a>
                                        </td>
                                        <td style="text-align:center">
                                            {{ $post->type }}
                                        </td>
                                    </tr>
                                    @elseif($LoggedUserInfo->id == $post->user_id && $post->type == 'Draft')
                                        <tr class="dataTabPosts">
                                            <td>
                                                {{ $post->title }}
                                            </td>
                                            <td style="text-align:center">
                                                {{ $post->type }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                </div>
            </x-slot>
        </x-features>
    </x-slot>
</x-layout>
