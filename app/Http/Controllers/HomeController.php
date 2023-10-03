<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		return view('home');
	}
	public function profile()
	{
		return view('profile');
	}
	public function contact()
	{
		return view('contact');
	}
	public function faq()
	{
		return view('faq');
	}
}
