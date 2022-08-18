<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cow;
use App\Models\Shade;
use App\Models\Supplier;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $shade = Shade::count();
        $cow = Cow::count();
        $supplier = Supplier::count();
        return view('website.pages.index', compact('cow', 'shade', 'supplier'));
    }
}
