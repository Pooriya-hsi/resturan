<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();
        return view('features.index', compact('features'));
    }

    public function create()
    {
        return view('features.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string',
            'icon' => 'required|string',
            'body' => 'required|string',
        ]);

        Feature::create([
            'title' => $request->title,
            'body' => $request->body,
            'icon' => $request->icon,
        ]);

        return redirect()->route('feature.index')->with('success', 'ویژگی با موفقیت ایجاد شد');
    }

    public function edit(Feature $feature)
    {
        return view('features.edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'icon' => 'required|string'
        ]);

        $feature->update([
            'title' => $request->title,
            'body' => $request->body,
            'icon' => $request->icon
        ]);

        return redirect()->route('feature.index')->with('success', 'ویژگی با موفقیت ویرایش شد');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->route('feature.index')->with('warning', 'ویژگی با موفقیت حذف شد');
    }
}
