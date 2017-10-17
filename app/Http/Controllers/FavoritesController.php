<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class FavoritesController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }

    public function store(Reply $reply) {

        $reply->favorite();

        return back();
    }
}
