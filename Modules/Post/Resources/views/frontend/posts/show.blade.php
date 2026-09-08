@extends("frontend.layouts.app")

@section("title")
    {{ $$module_name_singular->name ?? "Post" }}
@endsection

@section("content")
    @php
        $post = $$module_name_singular;
        $shareUrl = route("frontend.posts.show", [encode_id($post->id), $post->slug]);
        $shareDescription = $post->meta_description ?: $post->intro;
        $shareImage = $post->meta_og_image ?: $post->image;

        if ($shareImage && ! \Illuminate\Support\Str::startsWith($shareImage, ["http://", "https://"])) {
            $shareImage = asset($shareImage);
        }
    @endphp

    <section class="body-font bg-gray-100 px-6 text-gray-600 sm:px-20 dark:bg-gray-800 dark:text-gray-400">
        <div class="container mx-auto flex flex-col items-center py-8 sm:py-16 md:flex-row">
            <div class="flex flex-col items-center text-center sm:w-4/12 md:items-start md:pr-16 md:text-left lg:flex-grow lg:pr-24">
                <h1 class="mb-4 text-3xl font-medium text-gray-800 sm:text-4xl dark:text-gray-200">
                    {{ $post->name ?? "Post" }}
                </h1>
                @if ($post->intro)
                    <p class="mb-8 leading-relaxed">{{ $post->intro ?? "" }}</p>
                @endif

                @include("frontend.includes.messages")
            </div>
            <div class="mb-4 w-full sm:mb-0 sm:w-8/12">
                <img class="rounded object-cover object-center shadow-md" src="{{ $post->image }}" alt="{{ $post->name }}" />
            </div>
        </div>
    </section>

    <section class="px-6 py-6 sm:px-20 sm:py-10 dark:bg-gray-700 dark:text-gray-300">
        <div class="container mx-auto flex flex-col md:flex-row">
            <div class="flex flex-col sm:w-8/12 sm:pr-8 lg:flex-grow">
                <div class="pb-5">{!! $post->content !!}</div>

                <hr />

                <div class="py-5">
                    <div class="flex flex-col justify-between sm:flex-row">
                        <div class="pb-2">
                            {{ __("Written by") }}:
                            {{ $post->created_by_alias ?: $post->created_by_name }}
                        </div>
                        <div class="pb-2">
                            {{ __("Published at") }}:
                            {{ $post->published_at?->isoFormat("llll") }}
                        </div>
                    </div>
                </div>

                @if ($post->category)
                    <div class="flex flex-row justify-between py-5">
                        <div>
                            <span class="font-weight-bold">@lang("Category"):</span>
                            <x-cube::badge
                                :url="route('frontend.categories.show', [encode_id($post->category_id), $post->category->slug])"
                                :text="$post->category->name ?? '-"
                            />
                        </div>
                    </div>
                @endif

                @if ($post->tags->count())
                    <div class="py-5">
                        <span class="font-weight-bold">@lang("Tags"):</span>
                        @foreach ($post->tags as $tag)
                            <x-cube::badge
                                :url="route('frontend.tags.show', [encode_id($tag->id), $tag->slug])"
                                :text="$tag->name ?? $tag->slug ?? '-'"
                            />
                        @endforeach
                    </div>
                @endif

                <div class="py-5">
                    <x-sharekit::buttons
                        theme="tailwind"
                        label="{{ __('Share with others') }}"
                        :url="$shareUrl"
                        :title="$post->name ?? '-'"
                        :description="$shareDescription"
                        :image="$shareImage"
                        :networks="['x', 'facebook', 'linkedin', 'whatsapp', 'telegram', 'email', 'copy', 'native']"
                        size="sm"
                        :show-heading="true"
                    />
                </div>
            </div>

            <div class="flex flex-col sm:w-4/12">
                <div class="py-5 sm:pt-0">
                    <livewire:post.frontend-recent-posts />
                </div>
            </div>
        </div>
    </section>
@endsection
