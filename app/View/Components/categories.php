<?php

namespace App\View\Components;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class categories extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];

        $yourCategory = DB::table('user as u')
            ->join('gestione as g','u.id','=','g.user_id')
            ->join('category as c','c.id','=','g.category_id')
            ->select('u.id as user_id','c.name as nameCategory')
            ->get();

        return view('components.categories',$data,['yourCategory' => $yourCategory])
            ->with('posts',Post::orderBy('updated_at','DESC',)->get());
    }
}
