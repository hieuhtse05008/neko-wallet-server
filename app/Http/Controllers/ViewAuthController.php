<?php


namespace App\Http\Controllers;


use App\Enum\Locales;
use App\Models\Blog;
use App\Repositories\BlogRepository;

class ViewAuthController extends ViewController
{
    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        parent::__construct();
        $this->blogRepository = $blogRepository;
    }

    public function uploadBlogView(Blog $blog)
    {

        $relations = getRelationsFromIncludeRequest([]);
        $blog->skipTranslation(true);
        $blog = $this->blogRepository->with($relations)->parserResult($blog);

        return $this->view('web.blog.upload_blog', [
            'blog' => $blog,
            'statuses'=>\App\Enum\Blog::STATUSES,
        ]);

    }

}
