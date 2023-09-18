<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PorfolioRadio;
use Illuminate\Http\Request;

class PorfolioRadioController extends Controller {
	private $destinationPath = 'portfolios/radios';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$porfolio_radios = PorfolioRadio::orderBy('id', 'desc')->paginate(10);

		return view('porfolio_radios.index', compact('porfolio_radios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('porfolio_radios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$porfolio_radio = new PorfolioRadio();

		$file = $request->file('image');
		$filename = $file->getClientOriginalName();
		$file->move($this->destinationPath, $filename);

		$porfolio_radio->title = $request->input("title");
        $porfolio_radio->link = $request->input("link");
        $porfolio_radio->image = $filename;

		$porfolio_radio->save();

		return redirect()->route('admin.porfolio_radios.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$porfolio_radio = PorfolioRadio::findOrFail($id);

		return view('porfolio_radios.show', compact('porfolio_radio'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$porfolio_radio = PorfolioRadio::findOrFail($id);

		return view('porfolio_radios.edit', compact('porfolio_radio'));
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
		$porfolio_radio = PorfolioRadio::findOrFail($id);

		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$filename = $file->getClientOriginalName();

			$porfolio_radio->image = $filename;
			$file->move($this->destinationPath, $filename);
		}

		$porfolio_radio->title = $request->input("title");
        $porfolio_radio->link = $request->input("link");

		$porfolio_radio->save();

		return redirect()->route('admin.porfolio_radios.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$porfolio_radio = PorfolioRadio::findOrFail($id);
		$porfolio_radio->delete();

		return redirect()->route('admin.porfolio_radios.index')->with('message', 'Item deleted successfully.');
	}

}
