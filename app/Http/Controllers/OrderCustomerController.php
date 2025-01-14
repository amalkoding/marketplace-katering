<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderCustomerController extends Controller
{
    public function index()
    {
        $orderCustomers = Order::with(['user', 'menu'])->where('user_id', auth()->user()->id)->get();

        return view('pages.customer.order.index', compact('orderCustomers'));
    }

    public function invoice($id)
    {
        $orderCustomer = Order::with(['user', 'menu'])->findOrFail($id);
        return view('pages.customer.order.invoice', compact('orderCustomer'));
    }
}
