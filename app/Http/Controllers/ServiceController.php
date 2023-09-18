<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller {
	private $destinationPath = 'servicess';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$services = Service::orderBy('id', 'desc')->paginate(10);

		return view('services.index', compact('services'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('services.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$service = new Service();

		$file = $request->file('image');
		$filename = $file->getClientOriginalName();
		$file->move($this->destinationPath, $filename);

		$service->title = $request->input("title");
        $service->image = $filename;
        $service->icon = $request->input("icon");
        $service->content = $request->input("content");

		$service->save();

		return redirect()->route('admin.services.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$service = Service::findOrFail($id);

		return view('services.show', compact('service'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$service = Service::findOrFail($id);

		return view('services.edit', compact('service'));
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
		$service = Service::findOrFail($id);

		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$filename = $file->getClientOriginalName();

			$service->image = $filename;
			$file->move($this->destinationPath, $filename);
		}

		$service->title = $request->input("title");
        // $service->image = $request->input("image");
        $service->icon = $request->input("icon");
        $service->content = $request->input("content");

		$service->save();

		return redirect()->route('admin.services.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$service = Service::findOrFail($id);
		$service->delete();

		return redirect()->route('admin.services.index')->with('message', 'Item deleted successfully.');
	}

}
