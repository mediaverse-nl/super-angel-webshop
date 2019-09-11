<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\ContactStoreRequest;
use App\Mail\SendContact;
use App\Traits\SeoManager;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    use SEOTools, SeoManager;

    public function index()
    {
        //default seo
        $this->seo()
            ->setTitle($this->getPageSeo()->title .' | ')
            ->setDescription($this->getPageSeo()->description);
        //opengraph
        $this->seo()
            ->opengraph()
            ->setUrl(url()->current())
            ->addProperty('type', 'website');
        //twitter
        $this->seo()
            ->twitter()
            ->setSite('@username');

        return view('site.contact');
    }

    public function store(ContactStoreRequest $request)
    {
        Mail::to($request->email)->send(new SendContact($request));

        return redirect()->back();
    }
}
