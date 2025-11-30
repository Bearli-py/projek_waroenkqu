<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\MenuData;

class HomeController extends Controller
{
    public function index()
    {
        $popularMenus = MenuData::getPopularMenus();
        $categories = MenuData::getCategories();
        
        return view('pages.home', compact('popularMenus', 'categories'));
    }
}