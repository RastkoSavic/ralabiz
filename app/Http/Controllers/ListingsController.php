<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Listing Model
use App\Listing;

// Listings Controller CRUD
class ListingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of Listings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get All Listings
        $listings = Listing::orderBy('created_at', 'desc')->get();

        return view('listings.index')->with('listings', $listings);
    }

    /**
     * Show the form for creating a new Listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created Listing in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email'
        ]);
        
        // Create New Listing
        $listing = new Listing;
        $listing->name = $request->input('name');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->address = $request->input('address');
        $listing->bio = $request->input('bio');
        $listing->user_id = auth()->user()->id;

        // Save Listing
        $listing->save();

        return redirect('/dashboard')->with('success', 'Listing Added');
    }

    /**
     * Display the specified Listing.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get listing
        $listing = Listing::find($id);

        return view('listings.show')->with('listing', $listing);
    }

    /**
     * Show the form for editing the specified Listing.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get listing
        $listing = Listing::find($id);

        // Check for correct User
        if (auth()->user()->id !== $listing->user_id) {
            return redirect('/listings')->with('error', 'Unauthorized Page');
        }

        return view('listings.edit')->with('listing', $listing);
    }

    /**
     * Update the specified Listing in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate Data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email'
        ]);
        
        // Get listing
        $listing = Listing::find($id);

        // Set new values
        $listing->name = $request->input('name');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->address = $request->input('address');
        $listing->bio = $request->input('bio');
        $listing->user_id = auth()->user()->id;

        // Save Listing
        $listing->save();

        return redirect('/dashboard')->with('success', 'Listing Updated');
    }

    /**
     * Remove the specified Listing from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // Get Listing
        $listing = Listing::find($id);

        // Check for correct User
        if (auth()->user()->id !== $listing->user_id) {
            return redirect('/listings')->with('error', 'Unauthorized Page');
        }

        // Delete Listing
        $listing->delete();

        return redirect('/dashboard')->with('success', 'Listing Deleted');
    }
}
