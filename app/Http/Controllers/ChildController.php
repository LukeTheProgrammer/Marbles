<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Child;

class ChildController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct () {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Child.
     *
     * @return Response
     */
    public function index (Request $request) {
        $children = Child::all();
        return view('child.index', [
            'children' => $children,
        ]);
    }

    /**
     * Show the form for creating a new Child.
     *
     * @return Response
     */
    public function create (Request $request) {
        return view('child.create');
    }

    /**
     * Store a newly created Child in storage.
     *
     * @return Response
     */
    public function store (Request $request) {
        if (Auth::id() != 1) {
            return redirect()
                ->back()
                ->with('failure_msg', 'You are not authorized to add a new Child.');
        }

        $child = new Child();
        $child->marbles = 0;
        $child->name = $request->input('name');
        $child->save();

        return redirect()
            ->route('child.index')
            ->with('success_msg', 'Child was successfully added.');
    }

    /**
     * Display the specified Child.
     *
     * @param  int  $id
     * @return Response
     */
    public function show (Request $request, $id, $date = null) {
        $child = Child::findOrFail($id);

        return view('child.show', [
            'child' => $child,
        ]);
    }

    /**
     * Show the form for editing the specified Child.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit ($id, Request $request) {
        $child = Child::find($id);

        if (is_null($child)) {
            return redirect()
                ->back()
                ->with('failure_msg', 'Could not find a Child with an id of ' . $id);
        }

        return view('child.edit', [
            'child' => $child,
        ]);
    }

    /**
     * Update the specified Child in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update ($id, Request $request) {
        if (Auth::id() != 1) {
            return redirect()
                ->back()
                ->with('failure_msg', 'You are not authorized to add a new client.');
        }

        $child = Child::findOrFail($id);
        $child->name = $request->input('name');
        $child->save();

        return redirect()
            ->route('child.show', [$id])
            ->with('success_msg', 'Child was successfully updated.');
    }

    /**
     * Remove the specified Child from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy ($id, Request $request) {
        //
    }

}
