<?php

namespace Modules\Post\Http\Controllers\Frontend;

use Illuminate\Contracts\View\View;
use Nasirkhan\ModuleManager\Modules\Post\Http\Controllers\Frontend\PostsController as VendorPostsController;
use Modules\Post\Models\Post;

class PostsController extends VendorPostsController
{
    public function show($id): View
    {
        $post = Post::query()
            ->with('category', 'tags')
            ->findOrFail(decode_id($id));

        return view('post::frontend.posts.show', [
            'module_title' => 'Posts',
            'module_name' => 'posts',
            'module_icon' => 'fa-regular fa-sun',
            'module_action' => 'Show',
            'module_name_singular' => 'post',
            'post' => $post,
        ]);
    }
}
