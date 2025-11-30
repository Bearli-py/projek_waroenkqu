<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\MenuData;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category', 'Semua');
        
        if ($category === 'Semua') {
            $menus = MenuData::getMenus();
        } else {
            $menus = MenuData::getMenusByCategory($category);
        }
        
        $categories = MenuData::getCategories();
        
        return view('pages.menu', compact('menus', 'categories', 'category'));
    }
    
    public function show($id)
    {
        $menu = MenuData::getMenuById($id);
        
        if (!$menu) {
            abort(404, 'Menu tidak ditemukan');
        }
        
        return view('pages.menu-detail', compact('menu'));
    }
}