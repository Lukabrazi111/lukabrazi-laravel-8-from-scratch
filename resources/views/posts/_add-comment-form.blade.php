@auth
    <x-panel>
        <form action="{{ route('posts.store', $post->slug) }}" method="post">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40"
                     height="40"
                     class="rounded-full">

                <h2 class="ml-4">Want to parcitipate?</h2>
            </header>

            <div class="mt-6">
                            <textarea
                                placeholder="Quick, thing of something to say!" name="body"
                                class="w-full text-sm focus:outline-none focus:ring p-2"
                                rows="5"
                                required></textarea>

                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
                <x-form.button>Submit</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="{{ route('login.create') }}" class="hover:underline">Log In</a> to leave a comment.
    </p>
@endauth
