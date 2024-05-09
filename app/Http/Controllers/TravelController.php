<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::query()
            ->where('user_id', request()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('travel.index', ['travels' => $travels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('travel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['string', 'nullable']
        ]);
        $data['user_id'] = $request->user()->id;
        $travel = Travel::create($data);
        return to_route('travel.show', $travel)->with('message', 'travel was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        if ($travel->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('travel.show', ['travel' => $travel]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel)
    {
        if ($travel->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('travel.edit', ['travel' => $travel]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $travel)
    {
        if ($travel->user_id !== request()->user()->id) {
            abort(403);
        }
        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['string', 'nullable']
        ]);
        $travel->update($data);
        return to_route('travel.show', $travel)->with('message', 'travel was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        if ($travel->user_id !== request()->user()->id) {
            abort(403);
        }
        $travel->delete();

        return to_route('travel.index')->with('message', 'Travel was deleted');
    }
}
