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
                                <th class="textTables">TAG</th>
                                <th class="textTables" style="text-align:center">SLUG</th>
                                <th class="textTables" style="text-align:center">NO. OF POSTS</th>
                            </tr>
                            @foreach ($posts as $post)
                            <tr class="dataTabPosts">
                                <td>
                                    <a href="/tags/{{ $post->tag }}" class="tagTitlePost"> {{ $post->tag }}</a><br>
                                </td>
                                <td style="text-align:center">
                                    <p>{{ $post->tag }}</p>
                                </td>
                                <td style="text-align:center">
                                    <a href="" class="numberTagPost">{{ $post->total }}
                                        @if($post->total > 1)
                                            posts
                                        @else
                                            post
                                        @endif
                                    </a>
                                </td>

                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </x-slot>
        </x-features>
    </x-slot>
</x-layout>
