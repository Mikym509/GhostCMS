<x-layout>
    <x-slot name="main">
        <x-features>
            @slot('title')
                > Published
            @endslot
                <x-slot name="table">
                    <div class="row justify-content-md-center" >
                    <div class="col-sm-12">
                        <table class="tablePosts">
                            <tr class="titleTabPosts">
                                <th class="textTables">TITLE</th>
                                <th class="textTables" style="text-align:left">STATUS</th>
                            </tr>

                            @foreach($posts as $post)
                            @if ($post->type == 'Published')
                            <tr class="dataTabPosts">

                                <td>
                                    <span class="titlePost">
                                        <a href="/blog/{{ $post->slug }}" class="linkPost" style="color:#808080"> {{ $post->title }}</a><br>
                                    </span>
                                    <span class="subDescriptionPost">
                                        By
                                        <span class="subDescriptionPostUser">
                                            {{ $post->user->name." ".$post->user->surname }},
                                        </span> Created on {{ date('jS M Y',strtotime($post->updated_at)) }}
                                    </span>
                                </td>
                                <td> <span class="typePost"> {{ $post->type }} </span></td>
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
