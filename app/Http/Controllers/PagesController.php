<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function contact()
  {
    return view('pages.contact');
  }

  public function about()
  {
    $first_name = "Luke";
    $last_name = "Skywalker";

    return view('pages.about',compact('first_name','last_name'));
  }
}
