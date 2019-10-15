<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteMapController extends Controller
{
    public function __invoke()
    {
        set_time_limit(300);

        SitemapGenerator::create('https://tantemartje.nl')
            ->configureCrawler(function (Crawler $crawler) {
                $crawler->setMaximumDepth(4);
            })
            ->hasCrawled(function (Url $url) {

                $urls = [
                    'gegevens',
                    'privacy-en-cookiebeleid',
                    'shoppingcart',
                    'algemene-voorwaarden'
                ];

                foreach ($urls as $i){
                    if ($url->segment(1) === $i) {
                        return;
                    }
                }

                return $url;
            })
            ->writeToFile('sitemap.xml');

        return 'ready';
    }
}
