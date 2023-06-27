<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // all the listings
    public function index() {
        // dd(user());
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    //single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create() {
        return view('listings.create');
    }

    //storing datas
    public function store(Request $request) {
        // dd($request->file('logo'));
        $formData = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'email' => ['required','email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);
        //checking image file here
        if($request->hasFile('logo'))
        {
            $formData['logo'] = $request->file('logo')->store('logos', 'public');   
        }

        $formData['user_id'] = auth()->id();

        //to the model
        Listing::create($formData);

        return redirect('/')->with('message', 'Listing has been created successfully');
    }

    //editing
    public function edit(Listing $listing) {
        //Making sure if owner is right
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        // dd($listing);
        return view('listings.edit',['listing' => $listing ]);
    }

    //update`
    public function update(Request $request, Listing $listing) {
        //Making sure if owner is right
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        // dd($listing);
        $formData = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'email' => ['required','email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);
        //checking image file here
        if($request->hasFile('logo'))
        {
            $formData['logo'] = $request->file('logo')->store('logos', 'public');   
        }
        //to the model
        $listing->update($formData);

        return back()->with('message', 'Listing updated successfully');
    }

    public function destroy(Listing $listing) {
        //Making sure if owner is right
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    //manage listings
    public function manage() {
        // dd(auth()->user()->listings());
        return view('listings.manage',['listings' => auth()->user()->listings]);
    }
}
