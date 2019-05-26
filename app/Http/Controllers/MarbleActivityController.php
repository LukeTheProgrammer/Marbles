<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Child;
use App\Marble;
use App\MarbleActivity;

class MarbleActivityController extends Controller
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
        return view('marble_activity.index', [
            'activities' => MarbleActivity::all(),
        ]);
    }

    /**
     * Show the form for creating a new record.
     *
     * @return Response
     */
    public function create (Request $request) {

        return view('marble_activity.create', $this->formOpts());
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
                ->with('failure_msg', 'You do not have permission to add a new Marble Activity.');
        }

        $child = Child::findOrFail($request->input('child_id'));
        $marble = Marble::findOrFail($request->input('marble_id'));

        $activity = new MarbleActivity();
        $activity->fill($request->all());
        $activity->save();

        $child->marbles += $marble->delta;
        $child->save();

        return redirect()
            ->route('marble-activity.index')
            ->with('success_msg', 'Activity was successfully added.');
    }

    /**
     * Display the specified Record.
     *
     * @param  int  $id
     * @return Response
     */
    public function show (Request $request, $id) {
        $activity = MarbleActivity::findOrFail($id);

        return view('marble_activity.show', [
            'activity' => $activity,
        ]);
    }

    /**
     * Show the form for editing the specified Record.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit (Request $request, $id) {
        $activity = MarbleActivity::findOrFail($id);

        $form_opts = $this->formOpts();
        $form_opts['activity'] = $activity;

        return view('marble_activity.edit', $form_opts);
    }

    /**
     * Update the specified Record in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update (Request $request, $id) {
        if (Auth::id() != 1) {
            return redirect()
                ->back()
                ->with('failure_msg', 'You do not have permission to edit a Marble Activity.');
        }

        // Find Models
        $child = Child::findOrFail($request->input('child_id'));
        $marble = Marble::findOrFail($request->input('marble_id'));
        $activity = MarbleActivity::findOrFail($id);

        // Retrieve OG models
        $og_child = Child::find($activity->child_id);
        $og_marble = Marble::find($activity->marble_id);

        // Remove old update if necessary
        if ($child->id !== $og_child->id || $marble->id !== $og_marble->id) {
            $og_child->marbles -= $og_marble->delta;
        }

        // Save new info
        $activity->fill($request->all());
        $activity->save();

        // Give marbles to correct child
        $child->marbles += $marble->delta;
        $child->save();

        return redirect()
            ->route('marble-activity.show', [$id])
            ->with('success_msg', 'Marble Activity was successfully updated.');
    }

    /**
     * Remove the specified Record from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy (Request $request, $id) {
        if (Auth::id() != 1) {
            return redirect()
                ->back()
                ->with('failure_msg', 'You do not have permission to edit a Marble Activity.');
        }

        $activity = MarbleActivity::findOrFail($id);
        $child = $activity->child;
        $marble = $activity->marble;

        $child->marbles -= $marble->delta;
        $child->save();

        $activity->delete();

        return redirect()
            ->route('marble-activity.index')
            ->with('success_msg', 'The Marble Activity was deleted.');
    }

    protected function formOpts()
    {
        // Child options
        $children = Child::all();
        $child_options = [];

        $children->each(function ($child, $index) use (&$child_options) {
            $child_options[$child->id] = $child->name;
        });

        // Marble options
        $marbles = Marble::all();
        $marble_options = [];

        $marbles->each(function ($marble, $index) use (&$marble_options) {
            $marble_options[$marble->id] = $marble->name;
        });

        return [
            'child_options' => $child_options,
            'marble_options' => $marble_options,
        ];
    }

}
