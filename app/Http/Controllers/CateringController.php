<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\ProfileMerchant;
use Illuminate\Http\Request;

class CateringController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $profileMerchants = ProfileMerchant::when($search, function ($query, $search) {
            return $query->where('company_name', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%');
        })->get();

        return view('pages.customer.catering.index', compact('profileMerchants', 'search'));
    }

    public function menu(Request $request, $merchant_id)
    {
        $search = $request->search;

        $menus = Menu::where('user_id', $merchant_id)
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->get();

        $merchant = ProfileMerchant::where('user_id', $merchant_id)->first();

        return view('pages.customer.catering.menu', compact('menus', 'search', 'merchant'));
    }

    public function order($menu_id)
    {
        $menu = Menu::where('id', $menu_id)->first();

        return view('pages.customer.catering.order', compact('menu'));
    }

    public function orderSubmit(Request $request, $menu_id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
            'tanggal_pengiriman' => 'required|date|after:today',
        ]);

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'menu_id' => $menu_id,
            'jumlah_porsi' => $request->jumlah,
            'tanggal_pengiriman' => $request->tanggal_pengiriman,
        ]);

        return redirect()->route('order-customer.invoice', ['id' => $order->id])->with('success', 'Order berhasil dibuat!');
    }
}
