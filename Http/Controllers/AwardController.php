<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Award;
use Illuminate\Http\Request;

class AwardController extends Controller {
	private $destinationPath = 'award';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$awards = Award::orderBy('id', 'desc')->paginate(10);

		return view('awards.index', compact('awards'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('awards.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$award = new Award();

		$file = $request->file('image');
		$filename = $file->getClientOriginalName();

		$award->image = $filename;

		$award->title = $request->input("title");
		$award->year = $request->input("year");
		$award->content = $request->input("content");

		$file->move($this->destinationPath, $filename);


		$award->save();

		return redirect()->route('admin.awards.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$award = Award::findOrFail($id);

		return view('awards.show', compact('award'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$award = Award::findOrFail($id);

		return view('awards.edit', compact('award'));
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
		$award = Award::findOrFail($id);

		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$filename = $file->getClientOriginalName();

			$award->image = $filename;
			$file->move($this->destinationPath, $filename);
		}

		$award->title = $request->input("title");
        $award->year = $request->input("year");
        $award->content = $request->input("content");

		$award->save();

		return redirect()->route('admin.awards.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$award = Award::findOrFail($id);
		$award->delete();

		return redirect()->route('admin.awards.index')->with('message', 'Item deleted successfully.');
	}

}
