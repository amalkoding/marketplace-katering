<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function dashboard()
    {
        $totalMenus = Menu::with(['user'])->where('user_id', auth()->user()->id)->count();
        $totalOrders = Order::with(['user', 'menu'])->whereHas('menu', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->count();
        $totalOrderCustomers = Order::with(['user', 'menu'])->where('user_id', auth()->user()->id)->count();

        return view('pages.dashboard', compact('totalMenus', 'totalOrders', 'totalOrderCustomers'));
    }

    public function profile()
    {
        return view('pages.profile');
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
