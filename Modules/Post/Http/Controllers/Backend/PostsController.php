<?php

namespace Modules\Post\Http\Controllers\Backend;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Nasirkhan\ModuleManager\Modules\Post\Enums\PostStatus;
use Nasirkhan\ModuleManager\Modules\Post\Enums\PostType;
use Nasirkhan\ModuleManager\Modules\Post\Http\Controllers\Backend\PostsController as VendorPostsController;

class PostsController extends VendorPostsController
{
    public function __construct()
    {
        parent::__construct();

        $this->module_model = 'Modules\\Post\\Models\\Post';
    }

    /**
     * Store validation rules.
     * Override this method in child class to customize store validation.
     */
    protected function storeValidationRules(Request $request): array
    {
        return [
            'name' => 'required|max:191',
            'slug' => 'nullable|max:191',
            'created_by_alias' => 'nullable|max:191',
            'intro' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png|max:2048',
            'category_id' => 'required|integer',
            'type' => Rule::enum(PostType::class),
            'is_featured' => 'required|integer',
            'tags_list' => 'nullable|array',
            'status' => Rule::enum(PostStatus::class),
            'published_at' => 'required|date',
            'meta_title' => 'nullable|max:191',
            'meta_keywords' => 'nullable|max:191',
            'order' => 'nullable|integer',
            'meta_description' => 'nullable',
            'meta_og_image' => 'nullable|max:191',
        ];
    }

    /**
     * Update validation rules.
     * Override this method in child class to customize update validation.
     */
    protected function updateValidationRules(Request $request, $id): array
    {
        return [
            'name' => 'required|max:191',
            'slug' => 'nullable|max:191',
            'created_by_alias' => 'nullable|max:191',
            'intro' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|integer',
            'type' => Rule::enum(PostType::class),
            'is_featured' => 'required|integer',
            'tags_list' => 'nullable|array',
            'status' => Rule::enum(PostStatus::class),
            'published_at' => 'required|date',
            'meta_title' => 'nullable|max:191',
            'meta_keywords' => 'nullable|max:191',
            'order' => 'nullable|integer',
            'meta_description' => 'nullable',
            'meta_og_image' => 'nullable|max:191',
        ];
    }

    /**
     * Store a new resource in the database.
     */
    public function store(Request $request): RedirectResponse
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Store';

        $validated_data = $request->validate($this->storeValidationRules($request));

        $data = Arr::except($validated_data, 'tags_list');
        $data['created_by_name'] = Auth::user()->name;

        $$module_name_singular = $module_model::create($data);
        $$module_name_singular->tags()->attach($request->input('tags_list'));

        flash("New '".Str::singular($module_title)."' Added")->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect("admin/{$module_name}");
    }

    /**
     * Updates a resource in the database.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Update';

        $validated_data = $request->validate($this->updateValidationRules($request, $id));

        $data = Arr::except($validated_data, 'tags_list');

        $$module_name_singular = $module_model::findOrFail($id);

        $$module_name_singular->update($data);

        $tags_list = $request->input('tags_list') ?? [];
        $$module_name_singular->tags()->sync($tags_list);

        flash(Str::singular($module_title)."' Updated Successfully")->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect()->route("backend.{$module_name}.show", $$module_name_singular->id);
    }
}
