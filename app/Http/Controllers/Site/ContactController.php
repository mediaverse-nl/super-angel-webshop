<?php

namespace App\Http\Controllers\Site;

use App\Traits\SeoManager;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
