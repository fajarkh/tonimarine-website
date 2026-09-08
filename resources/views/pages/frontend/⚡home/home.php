<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\Post\Models\Post;

new #[Layout('layouts::frontend')] #[Title('Home')] class extends Component
{
	public function with(): array
	{
		return [
			'posts' => Post::query()
				->with('category')
				->published()
				->latest('published_at')
				->limit(3)
				->get(),
		];
	}
};
