<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\FlyerRequest;
use App\Http\Controllers\Controller;
use App\Http\Utilities\Country;
use App\Flyer;
use App\Photo;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FlyersController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['show']]);

        // parent::__construct();
    }
    
    public function index() {
    	return view('pages.create');
    }

    public function create() {
    	return view('pages.create');
    }

    public function show($zip, $street) {
    	$flyer = Flyer::locatedAt($zip, $street);
    	return view('flyers.show', compact('flyer'));
    }

    public function store(FlyerRequest $request) {
    	Flyer::create($request->all());
    	flash()->success('Success', 'Flyer successfully created!');
    	return redirect()->back();
    }

    public function addPhoto($zip, $street, Request $request) {
        $this->validate($request, [
            'file' => 'required|mimes:jpg,jpeg,png,bmp']);

        $flyer = Flyer::locatedAt($zip, $street);

        if (!$flyer->ownedBy(\Auth::user())) {
            if ($request->ajax()) {
                return response(['message' => 'No way.'], 403);
            }

            flash('No way.');

            return redirect('/');
        }


        $file = $request->file('file');
        
        // $photo = Photo::fromForm($request->file('file'));
        $photo = $this->makePhoto($file);
        $flyer->savePhoto($photo);

    }

    protected function makePhoto(UploadedFile $file) {
        return Photo::named($file->getClientOriginalName())->move($file);
    }
}
