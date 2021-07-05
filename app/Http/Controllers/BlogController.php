<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Gestione;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
    function postsView()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('blog.post', $data)->with('posts', Post::orderBy('updated_at', 'DESC',)->get());
    }

    function draftsView()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('blog.drafts', $data)->with('posts', Post::orderBy('updated_at', 'DESC',)->get());
    }

    function scheduledView()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('blog.scheduled', $data)->with('posts', Post::orderBy('updated_at', 'DESC',)->get());
    }

    function publishedView()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('blog.published', $data)->with('posts', Post::orderBy('updated_at', 'DESC',)->get());
    }

    function tagView()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $posts = DB::table('posts')
            ->select('tag', DB::raw('count(*) as total'))
            ->where('type', '=', 'Published')
            ->groupByRaw('tag')
            ->get();
        return view('blog.tag', ['posts' => $posts], $data);
    }

    function categoryView()
    {
        $category = DB::table('posts as p')
            ->join('category as c', 'p.category_id', '=', 'c.id')
            ->select('c.name as name', DB::raw('count(*) as total'))
            ->where('p.type', '=', 'Published')
            ->groupByRaw('c.name')
            ->get();

        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];

        return view('blog.category', ['category' => $category])->with($data);
    }

    function create()
    {
        $gallery = Gallery::all();

        $yourCategory = DB::table('user as u')
            ->join('gestione as g', 'u.id', '=', 'g.user_id')
            ->join('category as c', 'g.category_id', '=', 'c.id')
            ->select('c.name as name', 'u.id as id')
            ->get();

        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];

        return view('blog.createPost', ['gallery' => $gallery], ['yourCategory' => $yourCategory])->with($data);
    }

    function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'tag' => 'required',
            'category' => 'required',
        ]);

        $gallery = $request->input('imageGallery');

        if ($request->image && $gallery == 'null') {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images/uploadImages'), $newImageName);
        } else if ($request->imageGallery) {
            $newImageName = $gallery;
        } else {
            $newImageName = 'null';
        }


        $user_id = $request->input('user_id');

        $category_id = $request->input('category');

        Post::create([
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'title' => $request->input('title'),
            'title' => $request->input('title'),
            'tag' => $request->input('tag'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'image_path' => $newImageName,
            'user_id' => $user_id,
            'category_id' => $category_id,
        ]);

        return redirect('/posts')->with('message', 'Your post has been added!');
    }

    /**
     * Display specific resources
     * @param string $slug
     * @return \Illuminate\Http\Response;
     */

    public function show($slug)
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('blog.show', $data)->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Display specific resources with tags
     * @param string $tag
     * @return \Illuminate\Http\Response;
     */
    public function showTags($tag)
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $posts = DB::table('posts as p')
            ->select('p.title as title', 'p.type as type', 'p.slug as slug', 'p.user_id as user_id')
            ->where('tag', '=', $tag)
            ->get();
        return view('blog.showTags', ['posts' => $posts])->with($data);
    }

    /**
     * edit a post
     * @param string $name
     * @return \Illuminate\Http\Response;
     */

    public function showCategory($name)
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $category = DB::table('posts as p')
            ->join('category as c', 'p.category_id', '=', 'c.id')
            ->select('p.slug as slug', 'p.title as title', 'p.type as type', 'c.name as name')
            ->where('p.type', '=', 'Published')
            ->where('c.name', '=', $name)
            ->get();

        return view('blog.showCategory', ['category' => $category])->with($data);
    }

    /**
     * edit a post
     * @param string $slug
     * @return \Illuminate\Http\Response;
     */

    public function edit($slug)
    {
        $gallery = Gallery::all();
        $category = Category::all();
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('blog.edit', ['gallery' => $gallery], ['category' => $category])
            ->with('post', Post::where('slug', $slug)->first())
            ->with($data);
    }

    /**
     * save the edited post
     * @param \Illuminate\Http\Request $request
     * @param string $slug
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $slug)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'tag' => 'required',
            'category' => 'required',
        ]);

        $gallery = $request->input('imageGallery');

        if ($request->image && $gallery == 'null') {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images/uploadImages'), $newImageName);
        } else if ($request->imageGallery) {
            $newImageName = $gallery;
        } else {
            $newImageName = 'null';
        }

        $user_id = $request->input('user_id');

        $category_id = $request->input('category');

        Post::where('slug', $slug)
            ->update([
                'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                'title' => $request->input('title'),
                'tag' => $request->input('tag'),
                'description' => $request->input('description'),
                'type' => $request->input('type'),
                'image_path' => $newImageName,
                'user_id' => $user_id,
                'category_id' => $category_id
            ]);

        return redirect('/posts');
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->input('name'),
        ]);

        $user_id = $request->input('user_id');
        $category_id = Category::latest()->first();

        Gestione::create([
            'user_id' => $user_id,
            'category_id' => $category_id->id,
        ]);

        return redirect('/posts/category');
    }

    /**
     * remove the post from the database
     * @param string $slug
     * @return \Illuminate\Http\Response
     */

    public function delete($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/posts');
    }
}