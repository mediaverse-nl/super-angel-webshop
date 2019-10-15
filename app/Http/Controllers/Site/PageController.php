<?php

namespace App\Http\Controllers\Site;

use App\Faq;
use App\Traits\SeoManager;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    use SEOTools, SeoManager;

    public function terms()
    {
        //default seo
        $this->seo()
            ->setTitle($this->getPageSeo()->title)
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

        return view('site.terms');
    }

    public function policy()
    {
        //default seo
        $this->seo()
            ->setTitle($this->getPageSeo()->title)
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

        return view('site.policy');
    }

    public function about()
    {
        //default seo
        $this->seo()
            ->setTitle($this->getPageSeo()->title)
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

        return view('site.about');
    }

    public function faq()
    {
        //default seo
        $this->seo()
            ->setTitle($this->getPageSeo()->title)
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

        $faq = new Faq;

        $faqs = $faq->get();

        return view('site.faq')
            ->with('faqs', $faqs);
    }

    public function categories()
    {
        //default seo
        $this->seo()
            ->setTitle($this->getPageSeo()->title)
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

        return view('site.page.categories');
    }
}
