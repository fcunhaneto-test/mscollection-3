<?php

namespace App\Http\Controllers;

use App\Models\Qualifiers\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TitleController extends Controller
{
    public function start($channel) {
        $url = url()->current();
        $url_path = parse_url($url, PHP_URL_PATH);
        $basename = explode('/', $url_path);

        if($basename[1] == 'filmes') {
            $table = 'movies';
            $header = 'Filmes';
        } else {
            $table = 'series';
            $header = 'Séries';
        }

        if(Auth::user()) {
            if(Auth::user()->role == 'admin') {
                $media = Media::all();
                $subheader = $media->where('slug', $channel)->first()->slug;
                return view('titles', compact('table', 'header', 'subheader', 'media'));
            }
        }

        $c_media = new Media();
        $media = $c_media->streams();
        $subheader = $c_media->where('slug', $channel)->first()->name;

        return view('titles', compact('table', 'header', 'subheader', 'media'));
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
}
