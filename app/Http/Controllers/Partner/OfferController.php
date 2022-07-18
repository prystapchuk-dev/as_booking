<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfferRequest;
use App\Models\Benefit;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Offer;
use App\Models\BenefitType;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::with('images', 'benefits')->get();

        return view('offers', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $offer = Offer::find(1);
        $benefits_list = Benefit::all();

        return view('partner.create_offer', compact('benefits_list', 'offer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfferRequest $request)
    {
        $data = $request->validated();

        $offer = Offer::create($data);

        foreach ($data['images'] as $image) {
           $path = $image->store('offers/images', 'public');
           $hash = sha1_file($image->getRealPath());

           $offer->images()->save(new Image(['path' => $path, 'hash' => $hash]));
        }

        $offer->attachBenefits($data['benefits']);

        return redirect()->route('offers.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        $benefits_list = Benefit::all();
        $checked_benefit_list = $offer->benefits()->pluck('id');

        return view('partner.edit_offer', compact(
            'offer',
            'benefits_list',
                      'checked_benefit_list',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfferRequest  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        $data = $request->validated();
        //dd($offer->images()->pluck('hash'));
        $hash_collect = $offer->images()->pluck('hash');

        foreach ($data['images'] as $image ) {
            if (!$hash_collect->contains(sha1_file($image->getRealPath()))){
            $path = $image->store('offers/images', 'public');
            $hash = sha1_file($image->getRealPath());
            $offer->images()->save(new Image(['path' => $path, 'hash' => $hash]));
            }
        }

        $offer->update($data);

        $current_benefits = $offer->benefits()->pluck('id');
        $new_benefits = collect($data['benefits']);


        $offer->attachBenefits($new_benefits->diff($current_benefits));

        return redirect()->route('offers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {

        $offer->delete();

        return redirect()->route('offers.index');

    }
}
