<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Publication\News\News;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return Factory|RedirectResponse|View
     */
    public function show()
    {
        $this->permissionBlock();

        $news = News::getNews()->paginate(12);

        return view('pages.blog.page', compact('news'));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function detail(Request $request)
    {
        $this->permissionBlock();

        $news    = News::getNews()->find($request['id']);
        $recents = News::getNews()->limit(3)->get();

        $this->permissionHasPage($news);

        return view('pages.blog.detail', compact('news', 'recents'));
    }
}
