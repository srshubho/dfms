<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cow;
use App\Models\User;
use App\Models\Shade;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $shade = Shade::count();
        $cow = Cow::count();
        $supplier = Supplier::count();
        return view('admin.pages.index', compact('cow', 'shade', 'supplier'));
    }

    public function settings()
    {
        return view('admin.pages.settings.settings');
    }

    public function changePassword(Request $request)
    {
        // dd($request);
        $validateData = $request->validate([
            'password' => ['required', new MatchOldPassword, 'min:5'],
            'newPassword' => ['required', 'min:5'],
            'confirmNewPassword' => ['required', 'same:newPassword', 'min:5'],
        ]);
        dd($request);

        $changed_password = User::find(auth()->user()->id)->update(['password' => Hash::make($request['newPassword'])]);

        if ($changed_password) {
            return back()->with(['message' => 'Password updated successfully!', 'alert-type' => 'success']);
        } else {
            return back()->with(['message' => 'Password update failed!', 'alert-type' => 'warning']);
        }
    }
}
