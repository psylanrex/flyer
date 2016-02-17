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
        $file = $request->file('file');
        

        // $photo = Photo::fromForm($request->file('file'));
        $photo = $this->makePhoto($file);
        $flyer = Flyer::locatedAt($zip, $street);
        $flyer->savePhoto($photo);
        
    }

    protected function makePhoto(UploadedFile $file) {
        return Photo::named($file->getClientOriginalName())->move($file);
    }
}
