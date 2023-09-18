<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Porfolio;
use Illuminate\Http\Request;

class PorfolioController extends Controller {
	private $destinationPath = 'portfolios';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$porfolios = Porfolio::orderBy('id', 'desc')->paginate(10);

		return view('porfolios.index', compact('porfolios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('porfolios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$porfolio = new Porfolio();

		$file = $request->file('image');
		$filename = $file->getClientOriginalName();
		$file->move($this->destinationPath, $filename);

		$porfolio->title = $request->input("title");
        $porfolio->image = $filename;

		$porfolio->save();

		return redirect()->route('admin.porfolios.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$porfolio = Porfolio::findOrFail($id);

		return view('porfolios.show', compact('porfolio'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$porfolio = Porfolio::findOrFail($id);

		return view('porfolios.edit', compact('porfolio'));
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
		$porfolio = Porfolio::findOrFail($id);

		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$filename = $file->getClientOriginalName();

			$porfolio->image = $filename;
			$file->move($this->destinationPath, $filename);
		}

		$porfolio->title = $request->input("title");
        // $porfolio->image = $request->input("image");

		$porfolio->save();

		return redirect()->route('admin.porfolios.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$porfolio = Porfolio::findOrFail($id);
		$porfolio->delete();

		return redirect()->route('admin.porfolios.index')->with('message', 'Item deleted successfully.');
	}

}
