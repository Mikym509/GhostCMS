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
                                    <th class="subTitleCategoryPosts">TITLE</th>
                                    <th class="textTables" style="text-align:center">STATUS</th>
                                    <th class="textTables" style="text-align:center">CATEGORY</th>
                                </tr>
                                @foreach($category as $category)
                                    <tr class="dataCategoryPosts">
                                        <td>
                                            <a href="/blog/{{ $category->slug }}" class="tagTitlePost">
                                                {{ $category->title }}
                                            </a>
                                        </td>
                                        <td style="text-align:center">
                                                <p> {{ $category->type }} </p>
                                        </td>
                                        <td style="text-align:center">
                                                <p> {{ $category->name }} </p>
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

