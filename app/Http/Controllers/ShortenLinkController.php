<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SimpleUrlShortener;
use Illuminate\Support\Str;

class ShortenLinkController extends Controller
{
    /**
     * show shorten list
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $shortLinks = SimpleUrlShortener::latest()->get();
        return view('shortenLink', compact('shortLinks'));
    }

    /**
     * Create the random code to make shorten link
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        $input['link'] = $request->link;
        $input['shortLink'] = Str::random(6);

        SimpleUrlShortener::create($input);

        return redirect('generate-shorten-link')
            ->with('OK', 'The Link were shorten Successfully!');
    }

    /**
     * Redirect url
     * @param $code
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function shortenLink($code)
    {
        $find = SimpleUrlShortener::where('shortLink', $code)->first();
        return redirect($find->link);
    }
}
