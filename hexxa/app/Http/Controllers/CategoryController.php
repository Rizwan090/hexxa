<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function category(category $category)
    {
        return view('life-style' ,[
            'category' => $category,
        ]);
    }

}
