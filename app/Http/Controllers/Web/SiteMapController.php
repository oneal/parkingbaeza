<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\Sitemap\SiteMap;
use App\Http\Controllers\Web\Sitemap\Url;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;

class SiteMapController extends Controller
{
    private $siteMap;

    public function index()
    {
        $this->siteMap = new SiteMap();

        $this->addArticles();
        $this->addCategories();
        $this->addDynamicPages();

        return response($this->siteMap->build(), 200)
            ->header('Content-Type', 'text/xml');
    }

    private function addArticles()
    {
        $articles = Post::where('status', 'PUBLISHED')->whereNotNull('slug')->get([
            'slug', 'updated_at'
        ]);

        foreach ($articles as $article) {
            $this->siteMap->add(
                Url::create("/blog/$article->slug")
                    ->lastUpdate($article->updated_at->startOfMonth()->format('c'))
                    ->frequency('monthly')
                    ->priority('0.9')
            );
        }
    }

    private function addCategories()
    {
        $categories = Category::withCount('posts')
            ->having('posts_count', '>', 0)
            ->get(['slug', 'updated_at']);

        foreach ($categories as $category) {
            $this->siteMap->add(
                Url::create("/categorias/$category->slug")
                    ->lastUpdate($category->updated_at->startOfMonth()->format('c'))
                    ->frequency('monthly')
                    ->priority('0.8')
            );
        }
    }

    private function addDynamicPages()
    {
        $pages = \App\Models\Page::where('status', 'ACTIVE')->get(['slug', 'updated_at']);

        foreach ($pages as $page) {
            if($page->slug == 'blog' && countPosts() == 0){
                 $continue = false;
            } else {
                $continue = true;
            }

            if($continue) {
                $this->siteMap->add(
                    Url::create($page->slug)
                        ->lastUpdate($page->updated_at->startOfMonth()->format('c'))
                        ->frequency('monthly')
                        ->priority('0.8')
                );
            }
        }
    }
}
