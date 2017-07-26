<?php
namespace App\Http\Controllers;


class IndexController extends Controller
{
	public function index()
	{
		return 'hello world';
	}

	public function trace()
	{
		return debug_backtrace();
	}
}
