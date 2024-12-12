<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $boards = Board::latest()->paginate(10);
            return view('boards.index', compact('boards'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load boards: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('boards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            Board::create([
                'name' => $request->name,
                'board_id' => uniqid('board_'),
            ]);

            DB::commit();

            return redirect()->route('boards.index')->with('success', 'Board created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withInput()->with('error', 'Failed to create board: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Board $board)
    {
        try {
            return view('boards.show', compact('board'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load board: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Board $board)
    {
        return view('boards.edit', compact('board'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Board $board)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $board->update([
                'name' => $request->name,
            ]);

            DB::commit();

            return redirect()->route('boards.index')->with('success', 'Board updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withInput()->with('error', 'Failed to update board: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $board)
    {
        DB::beginTransaction();
        try {
            $board->delete();

            DB::commit();

            return redirect()->route('boards.index')->with('success', 'Board deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to delete board: ' . $e->getMessage());
        }
    }
}

