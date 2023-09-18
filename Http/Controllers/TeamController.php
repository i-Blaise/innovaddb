<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller {
	private $destinationPath = 'teams';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$teams = Team::orderBy('id', 'desc')->paginate(10);

		return view('teams.index', compact('teams'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('teams.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$team = new Team();

		$file = $request->file('image');
		$filename = $file->getClientOriginalName();

		$team->image = $filename;

		$team->title = $request->input("title");
        // $team->image = $request->input("image");
        $team->position = $request->input("position");
				$team->content = $request->input("content");
				
				$file->move($this->destinationPath, $filename);

		$team->save();

		return redirect()->route('admin.teams.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$team = Team::findOrFail($id);

		return view('teams.show', compact('team'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$team = Team::findOrFail($id);

		return view('teams.edit', compact('team'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$team = Team::findOrFail($id);

		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$filename = $file->getClientOriginalName();

			$team->image = $filename;
			$file->move($this->destinationPath, $filename);
		}

		$team->title = $request->input("title");
        // $team->image = $request->input("image");
        $team->position = $request->input("position");
        $team->content = $request->input("content");

		$team->save();

		return redirect()->route('admin.teams.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$team = Team::findOrFail($id);
		$team->delete();

		return redirect()->route('admin.teams.index')->with('message', 'Item deleted successfully.');
	}

}
