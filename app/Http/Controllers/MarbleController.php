<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Marble;

class MarbleController extends Controller
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
     * Display a listing of all records
     *
     * @return Response
     */
    public function index (Request $request) {
        return view('marble.index', [
            'marbles' => Marble::all(),
        ]);
    }

    /**
     * Show the form for creating a new record.
     *
     * @return Response
     */
    public function create (Request $request) {
        return view('marble.create');
    }

    /**
     * Store a new record in the db
     *
     * @return Response
     */
    public function store (Request $request) {
        if (Auth::id() != 1) {
            return redirect()
                ->back()
                ->with('failure_msg', 'You do not have permission to add a new Marble.');
        }

        dd($request->all());

        $marble = new Marble();
        $marble->fill($request->all());
        $marble->save();

        return redirect()
            ->route('marble.index')
            ->with('success_msg', 'Marble was successfully added.');
    }

    /**
     * Display the specified Record.
     *
     * @param  int  $id
     * @return Response
     */
    public function show (Request $request, $id) {
        $marble = Marble::findOrFail($id);

        return view('marble.show', [
            'marble' => $marble,
        ]);
    }

    /**
     * Show the form for editing the specified Record.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit (Request $request, $id) {
        $marble = Marble::findOrFail($id);

        return view('marble.edit', [
            'marble' => $marble,
        ]);
    }

    /**
     * Update the specified Child in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update (Request $request, $id) {
        if (Auth::id() != 1) {
            return redirect()
                ->back()
                ->with('failure_msg', 'You do not have permission to edit a Marble.');
        }

        $marble = Marble::findOrFail($id);
        $marble->fill($request->all());
        $marble->save();

        return redirect()
            ->route('marble.show', [$id])
            ->with('success_msg', 'Marble was successfully updated.');
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
