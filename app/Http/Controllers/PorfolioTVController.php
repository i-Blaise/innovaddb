<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PorfolioTV;
use Illuminate\Http\Request;

class PorfolioTVController extends Controller {
	private $destinationPath = 'portfolios/tv';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$porfolio_t_vs = PorfolioTV::orderBy('id', 'desc')->paginate(10);

		return view('porfolio_t_vs.index', compact('porfolio_t_vs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('porfolio_t_vs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$porfolio_t_v = new PorfolioTV();

		$file = $request->file('image');
		$filename = $file->getClientOriginalName();
		$file->move($this->destinationPath, $filename);

		$porfolio_t_v->title = $request->input("title");
        $porfolio_t_v->image = $filename;
        $porfolio_t_v->link = $request->input("link");

		$porfolio_t_v->save();

		return redirect()->route('admin.porfolio_tvs.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$porfolio_t_v = PorfolioTV::findOrFail($id);

		return view('porfolio_t_vs.show', compact('porfolio_t_v'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$porfolio_t_v = PorfolioTV::findOrFail($id);

		return view('porfolio_t_vs.edit', compact('porfolio_t_v'));
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
		$porfolio_t_v = PorfolioTV::findOrFail($id);

		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$filename = $file->getClientOriginalName();

			$porfolio_t_v->image = $filename;
			$file->move($this->destinationPath, $filename);
		}

		$porfolio_t_v->title = $request->input("title");
				// $porfolio_t_v->image = $request->input("image");
				$porfolio_t_v->link = $request->input("link");

		$porfolio_t_v->save();

		return redirect()->route('admin.porfolio_tvs.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$porfolio_t_v = PorfolioTV::findOrFail($id);
		$porfolio_t_v->delete();

		return redirect()->route('admin.porfolio_tvs.index')->with('message', 'Item deleted successfully.');
	}

}
