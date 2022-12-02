<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bb;

class BbsController extends Controller
{
    public function index()
    {
        $bbs = Bb::latest()->get();
        $s = "Объявления\r\n\r\n";
        foreach ($bbs as $bb) {
            $s .= $bb->title . PHP_EOL;
            $s .= $bb->price . " руб.". PHP_EOL;
            $s .= PHP_EOL;
        }

        return response($s)->header('Content-Type', 'text/plain');
    }

    public function detail(Bb $bb)
    {
        $s = $bb->title .PHP_EOL.PHP_EOL;
        $s .= $bb->content .PHP_EOL;
        $s .= $bb->price . " руб.".PHP_EOL;
        return response($s)->header('Content-Type', 'text/plain');
    }
}
