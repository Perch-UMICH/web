<?php
/**
 * Created by PhpStorm.
 * User: han
 * Date: 7/29/17
 * Time: 2:53 PM
 */

namespace App\Http\Controllers;


class StaticController extends Controller {

    public function getIndex() {
        return view('welcome');
    }

    public function getAbout() {
        return view('about');
    }
}