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
//        dd($blog);
        $blog->skipTranslation(true);
        $blogData = $this->blogRepository->with($relations)->parserResult($blog);

        if (empty($blogData['id'])) {
            $defaultLocaleObject = [];
            foreach (Locales::AVAILABLE_LOCALES as $locale){
                $defaultLocaleObject[$locale] = '';
            }
            foreach ($blog->getTranslatableAttributes() as $translatableAttribute) {
                $blogData[$translatableAttribute] = $defaultLocaleObject;
            }
            $blogData['tags'] = '';
        }

        return $this->view('web.blog.upload_blog', [
            'blog' => $blogData,
            'statuses' => \App\Enum\Blog::STATUSES,
        ]);

    }

}
