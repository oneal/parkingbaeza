<?php

namespace App\Observers;

use App\Models\Page;
use Illuminate\Support\Str;

class PageObserver
{
    /**
     * Handle the Page "created" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function creating(Page $page)
    {
        $slug = Str::slug($page->title, '-');
        $pageExist = Page::where('slug', $slug)->first();
        if(isset($pageExist)) {
            $numPage = Page::count() + 1;
            $page->slug_page = $slug.'-'.$numPage;
            $page->slug = $slug.'-'.$numPage;
        } else {
            $page->slug_page = $slug;
            $page->slug = $slug;
        }
    }

    /**
     * Handle the Page "updated" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function updating(Page $page)
    {
        $slug = Str::slug($page->title, '-');
        $pageExist = Page::where('slug', $slug)->first();
        if(isset($pageExist)) {

        } else {
            $page->slug = $slug;
        }
    }

    /**
     * Handle the Page "deleted" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function deleted(Page $page)
    {
        //
    }

    /**
     * Handle the Page "restored" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function restored(Page $page)
    {
        //
    }

    /**
     * Handle the Page "force deleted" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function forceDeleted(Page $page)
    {
        //
    }
}
