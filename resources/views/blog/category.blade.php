<x-layout>
    <x-slot name="main">
        <x-categories>
            @slot('title')
                > Categories
            @endslot
            <x-slot name="table">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-sm-12">
                            <table class="tablePosts">
                                <tr class="titleCategoryPosts">
                                    <th class="subTitleCategoryPosts">CATEGORY</th>
                                    <th class="textTables" style="text-align:center">NO. OF POSTS</th>
                                </tr>
                                @foreach($category as $category)
                                    <tr class="dataCategoryPosts">
                                        <td>
                                            <a href="/posts/category/{{ $category->name }}" class="tagTitlePost">
                                                {{ $category->name }}
                                            </a>
                                        </td>
                                        <td style="text-align:center">
                                            <a class="numberTagPost" href="#">
                                                {{ $category->total }}
                                                @if($category->total > 1)
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
                </div>
            </x-slot>
        </x-categories>
    </x-slot>
</x-layout>
