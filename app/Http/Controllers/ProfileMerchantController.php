<?php

namespace App\Http\Controllers;

use App\Models\ProfileMerchant;
use Illuminate\Http\Request;

class ProfileMerchantController extends Controller
{
    public function index()
    {
        $profileMerchant = ProfileMerchant::where('user_id', auth()->user()->id)->first();
        return view('pages.merchant.profile.index', compact('profileMerchant'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'required|string|max:1000',
            'contact' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        ProfileMerchant::create([
            'user_id' => auth()->user()->id,
            'company_name' => $request->company_name,
            'address' => $request->address,
            'contact' => $request->contact,
            'description' => $request->description,
        ]);

        return redirect()->route('merchant.profile.index')->with('success', 'Profil Merchant berhasil dibuat.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'required|string|max:1000',
            'contact' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $profileMerchant = ProfileMerchant::where('user_id', auth()->user()->id)->first();

        if (!$profileMerchant) {
            return redirect()->route('merchant.profile.index')->with('error', 'Profil Merchant tidak ditemukan.');
        }

        $profileMerchant->update([
            'company_name' => $request->company_name,
            'address' => $request->address,
            'contact' => $request->contact,
            'description' => $request->description,
        ]);

        return redirect()->route('merchant.profile.index')->with('success', 'Profil Merchant berhasil diperbarui.');
    }
}
