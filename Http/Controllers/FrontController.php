<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Home;
use App\Profile;
use App\Service;
use App\Porfolio;
use App\PorfolioPrint;
use App\PorfolioTV;
use App\PorfolioRadio;
use App\Client;
use App\Award;
use App\Team;
use Illuminate\Http\Request;

class FrontController extends Controller {
  public function index()
  {
    $homes = Home::orderBy('id', 'asc')->get();

		// return view('homes.index', compact('homes'));
    return view('frontend.home', compact('homes'));
  }

  public function aboutus()
  {
    $about = Profile::first();
    return view('frontend.aboutus', compact('about'));
  }

  public function services()
  {
    $services = Service::orderBy('id', 'asc')->get();
    return view('frontend.services', compact('services'));
  }

  public function portfolio()
  {
    $portfolios = Porfolio::orderBy('id', 'asc')->get();
    return view('frontend.portfolio', compact('portfolios'));
  }
  
  public function print()
  {
    $prints = PorfolioPrint::orderBy('id', 'asc')->get();
    return view('frontend.print', compact('prints'));
  }

  public function tv()
  {
    $tvs = PorfolioTV::orderBy('id', 'asc')->get();
    return view('frontend.tv', compact('tvs'));
  }
  
  public function radio()
  {
    $radios = PorfolioRadio::orderBy('id', 'asc')->get();
    return view('frontend.radio', compact('radios'));
  }
  
  public function clients()
  {
    $clients = Client::orderBy('id', 'desc')->get();
    return view('frontend.clients', compact('clients'));
  }

  public function awards()
	{
		$awards = Award::orderBy('id', 'asc')->get();

		return view('frontend.awards', compact('awards'));
	}
  
  public function teams()
	{
		$teams = Team::orderBy('id', 'asc')->get();

		return view('frontend.team', compact('teams'));
  }
  
  public function reset()
	{
		return view('auth.reset');
  }
  
  public function register()
	{
		return view('register', compact('errors'));
	}

}