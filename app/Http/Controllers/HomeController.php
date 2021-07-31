<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Post;
use App\Rubric;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request) {

        $title = 'Home page';
        $posts = Post::orderBy('id')->paginate(3);

        return view('index', compact('title', 'posts'));
    }


    public function create() {
        $title = 'Create post';
        $rubrics = Rubric::query()->pluck('title', 'id');

        return view('create', compact('title', 'rubrics'));
    }


    public function store(Request $request) {

        $rules = [
            'hdr' => 'required|min:10|max:100',
            'cntnt' => 'required',
            'rubric_id' => 'required|integer',
        ];

        $messages = [
            'hdr.required' => 'Поле заголовок обязательно для заполнения',
            'hdr.min' => 'Поле должно быть минимально :min символов',
            'hdr.max' => 'Поле должно быть не больше :max символов',
            'cntnt.required' => 'Поле контент обязательно для заполнения',
            'rubric_id.reuired' => 'Поле рубрика обязательно для заполнения',
            'rubric_id.integer' => 'Поле должно быть целым числом',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        Post::query()->create($request->all());

        return redirect()->route('home');
    }


}
