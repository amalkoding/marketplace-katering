<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'menu'])->whereHas('menu', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();

        return view('pages.merchant.order.index', compact('orders'));
    }

    public function create()
    {
        $users = User::where('role', 'customer')->get();
        $menus = Menu::with(['user'])->where('user_id', auth()->user()->id)->get();

        return view('pages.merchant.order.create', compact('users', 'menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'menu_id' => 'required|exists:menus,id',
            'jumlah_porsi' => 'required|integer|min:1',
            'tanggal_pengiriman' => 'required|date|after_or_equal:today',
        ]);

        Order::create([
            'user_id' => $request->user_id,
            'menu_id' => $request->menu_id,
            'jumlah_porsi' => $request->jumlah_porsi,
            'tanggal_pengiriman' => $request->tanggal_pengiriman,
        ]);

        return redirect()->route('order.index')->with('success', 'Order berhasil ditambahkan.');
    }

    public function edit(Order $order)
    {
        $users = User::where('role', 'customer')->get();
        $menus = Menu::with(['user'])->where('user_id', auth()->user()->id)->get();

        return view('pages.merchant.order.edit', compact('order', 'users', 'menus'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'menu_id' => 'required|exists:menus,id',
            'jumlah_porsi' => 'required|integer|min:1',
            'tanggal_pengiriman' => 'required|date|after_or_equal:today',
        ]);

        $order->update([
            'user_id' => $request->user_id,
            'menu_id' => $request->menu_id,
            'jumlah_porsi' => $request->jumlah_porsi,
            'tanggal_pengiriman' => $request->tanggal_pengiriman,
        ]);

        return redirect()->route('order.index')->with('success', 'Order berhasil diperbarui.');
    }

    public function invoice($id)
    {
        $order = Order::with(['user', 'menu'])->findOrFail($id);
        return view('pages.merchant.order.invoice', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Order berhasil dihapus.');
    }
}
