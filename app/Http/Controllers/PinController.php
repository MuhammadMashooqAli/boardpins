<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pins = Pin::with('user')->latest()->paginate(10);
            return view('pins.index', compact('pins'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load pins: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
            'publish_time' => 'nullable|date',
        ]);

        DB::beginTransaction();
        try {
            $imagePath = $request->file('image')->store('pins', 'public');

            Pin::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imagePath,
                'created_by' => auth()->id(),
                'pin_id' => uniqid('pin_'),
                'publish_time' => $request->publish_time,
            ]);

            DB::commit();

            return redirect()->route('pins.index')->with('success', 'Pin created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withInput()->with('error', 'Failed to create pin: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pin $pin)
    {
        try {
            return view('pins.show', compact('pin'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load pin: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pin $pin)
    {
        return view('pins.edit', compact('pin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pin $pin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'publish_time' => 'nullable|date',
        ]);

        DB::beginTransaction();
        try {
            if ($request->hasFile('image')) {
                // Delete old image
                Storage::disk('public')->delete($pin->image);

                // Store new image
                $pin->image = $request->file('image')->store('pins', 'public');
            }

            $pin->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $pin->image,
                'publish_time' => $request->publish_time,
            ]);

            DB::commit();

            return redirect()->route('pins.index')->with('success', 'Pin updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withInput()->with('error', 'Failed to update pin: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pin $pin)
    {
        DB::beginTransaction();
        try {
            // Delete image file
            Storage::disk('public')->delete($pin->image);

            $pin->delete();

            DB::commit();

            return redirect()->route('pins.index')->with('success', 'Pin deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to delete pin: ' . $e->getMessage());
        }
    }
}
