<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PorfolioPrint;
use Illuminate\Http\Request;

class PorfolioPrintController extends Controller {
	private $destinationPath = 'portfolios/print';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$porfolio_prints = PorfolioPrint::orderBy('id', 'desc')->paginate(10);

		return view('porfolio_prints.index', compact('porfolio_prints'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('porfolio_prints.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$porfolio_print = new PorfolioPrint();

		$file = $request->file('image');
		$filename = $file->getClientOriginalName();
		$file->move($this->destinationPath, $filename);

		$porfolio_print->title = $request->input("title");
        $porfolio_print->image = $filename;

		$porfolio_print->save();

		return redirect()->route('admin.porfolio_prints.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$porfolio_print = PorfolioPrint::findOrFail($id);

		return view('porfolio_prints.show', compact('porfolio_print'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$porfolio_print = PorfolioPrint::findOrFail($id);

		return view('porfolio_prints.edit', compact('porfolio_print'));
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
		$porfolio_print = PorfolioPrint::findOrFail($id);

		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$filename = $file->getClientOriginalName();

			$porfolio_print->image = $filename;
			$file->move($this->destinationPath, $filename);
		}

		$porfolio_print->title = $request->input("title");
        // $porfolio_print->image = $request->input("image");

		$porfolio_print->save();

		return redirect()->route('admin.porfolio_prints.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$porfolio_print = PorfolioPrint::findOrFail($id);
		$porfolio_print->delete();

		return redirect()->route('admin.porfolio_prints.index')->with('message', 'Item deleted successfully.');
	}

}
