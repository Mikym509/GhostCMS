<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;
use App\Models\User;
use App\Models\Post;
use App\Models\Gestione;

class features extends Component
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
            ->join('category as c','g.category_id','=','c.id')
            ->select('c.name as name','u.id as id')
            ->get();

        return view('components.features',$data,['yourCategory' => $yourCategory])
            ->with('posts',Post::orderBy('updated_at','DESC',)->get());
    }
}
