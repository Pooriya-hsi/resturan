<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('profile.index')->with('success', 'اطلاعات کاربری با موفقیت ثبت شد');
    }

    public function addresses()
    {
        $addresses = auth()->user()->addresses;
        return view('profile.addresses.index', compact('addresses'));
    }

    public function addressCreate()
    {
        $provinces = Province::all();
        $cities = City::all();
        return view('profile.addresses.create', compact('provinces', 'cities'));
    }

    public function addressStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'cellphone' => ['required', 'regex:/^09[0|1|2|3][0-9]{8}$/'],
            'postal_code' => ['required', 'regex:/^\d{5}[ -]?\d{5}$/'],
            'province_id' => 'required|integer',
            'city_id' => 'required|integer',
            'address' => 'required|string'
        ]);

        UserAddress::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'cellphone' => $request->cellphone,
            'postal_code' => $request->postal_code,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
        ]);

        return redirect()->route('profile.address')->with('success', 'آدرس شما با موفقیت ثبت شد');
    }

    public function addressEdit(UserAddress $address)
    {
        $provinces = Province::all();
        $cities = City::all();
        return view('profile.addresses.edit', compact('address', 'provinces', 'cities'));
    }

    public function addressUpdate(Request $request, UserAddress $address)
    {
        $request->validate([
            'title' => 'required|string',
            'cellphone' => ['required', 'regex:/^09[0|1|2|3][0-9]{8}$/'],
            'postal_code' => ['required', 'regex:/^\d{5}[ -]?\d{5}$/'],
            'province_id' => 'required|integer',
            'city_id' => 'required|integer',
            'address' => 'required|string'
        ]);

        $address->update([
            'title' => $request->title,
            'cellphone' => $request->cellphone,
            'postal_code' => $request->postal_code,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
        ]);

        return redirect()->route('profile.address')->with('success', 'آدرس شما با موفقیت ویرایش شد');
    }

    public function wishlist() 
    {
        $wishlist = auth()->user()->wishlist;
        return view('profile.wishlist', compact('wishlist'));
    }

    public function addToWishlist(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id'
        ]);

        if(!auth()->check()){
            return redirect()->back()->with('warning', 'برای ثبت در علاقه مندی در ابتدا وارد سیستم شوید');
        }

        Wishlist::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id
        ]);

        return redirect()->back()->with('success', 'محصول مورد نظر به لیست علاقه مندی ها اضافه شد');
    }

    public function removeFromWishlist(Request $request)
    {
        $request->validate([
            'wishlist' => 'required|integer|exists:wishlist,id'
        ]);

        $wishlist = Wishlist::findOrFail($request->wishlist);
        $wishlist->delete();

        return redirect()->back()->with('warning', 'محصول مورد نظر از لیست علاقه مندی ها حذف شد');
    }
}
