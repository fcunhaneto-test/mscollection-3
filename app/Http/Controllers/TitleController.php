<?php

namespace App\Http\Controllers;

use App\Models\Qualifiers\Media;
use App\Models\Title;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class TitleController extends Controller
{
    public function start($channel)
    {
        $index = 1;
        $view = 'titles';
        $url = url()->current();
        $url_path = parse_url($url, PHP_URL_PATH);
        $basename = explode('/', $url_path);

        if($basename[1] == 'admin') {
            $index = 2;
            $view = 'admin';
        }

        if($basename[$index] == 'filmes') {
            $header = 'Filmes';
        } else {
            $header = 'Séries';
        }

        if(Auth::user()) {
            if(Auth::user()->role == 'admin') {
                $media = Media::all();
                $subheader = $media->where('slug', $channel)->first()->slug;
                return view($view, compact('header', 'subheader', 'media'));
            }
        }

        $c_media = new Media();
        $media = $c_media->streams();
        $subheader = $c_media->where('slug', $channel)->first()->name;

        return view('titles', compact('header', 'subheader', 'media'));
    }

    public function startAdmin($channel) {
        $url = url()->current();
        $url_path = parse_url($url, PHP_URL_PATH);
        $basename = explode('/', $url_path);

        if($basename[2] == 'filmes') {
            $header = 'Filmes';
        } else {
            $header = 'Séries';
        }
        $media = Media::all();
        $subheader = $media->where('slug', $channel)->first()->name;
        return view('admin', compact('header', 'subheader', 'media'));
    }

    public function titlesStart($channel, $pp) {
        if (Gate::allows('isAdmin')) {
            return $this->table->titlesStart($channel, $pp);
        } elseif (Media::where('stream', true)->where('slug', $channel)->count() > 0) {
            return $this->table->titlesStart($channel, $pp);
        }
    }

    public function titlesPage($channel, $page, $pp) {
        if (Gate::allows('isAdmin')) {
            return $this->table->titlesPage($channel, $page, $pp);
        } elseif (Media::where('stream', true)->where('slug', $channel)->count() > 0) {
            return $this->table->titlesPage($channel, $page, $pp);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required_with|String',
            'year' => 'required',
        ]);
        $title = new Title();
        $exist = $title->where('title', '=', $request->title)->where('year', '=', $request->year)->count();
        if($exist) {
            return response()->json(['title' => $request->title], 202);
        }
        $title->title = $request->title;
        $title->original_title = $request->original_title;
        $title->year = $request->year;
        $title->time = $request->time;
        $title->our_rating = $request->our_rating;
        $title->imdb_rating = $request->imdb_rating;
        $title->category_1 = $request->category_1;
        $title->category_2 = $request->category_2;
        $title->poster = str_replace(' ', '', $request->title) . '-'. $request->year . '.jpg';
        $title->summary = $request->summary;
        $title->is_movie = $request->is_movie;

        $title->save();
        $media = json_decode($request->media);
        $title->media()->sync($media);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch,CURLOPT_URL, $request->img_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
//        dd($result);
        Storage::disk('posters')->put($title->poster, $result);

        return response()->json($title->id, 200);
    }
}
