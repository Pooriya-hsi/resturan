<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $item = AboutUs::first();
        return view('about.index', compact('item'));
    }

    public function edit(AboutUs $about)
    {
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, AboutUs $about)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'link' => 'required|string'
        ]);

        $about->update([
            'title' => $request->title,
            'body' => $request->body,
            'link' => $request->link
        ]);

        return redirect()->route('about.index')->with('success', 'تنظیمات درباره ما با موفقیت ویرایش شد');
    }
}
