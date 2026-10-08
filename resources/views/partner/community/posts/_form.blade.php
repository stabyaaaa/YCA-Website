<div class="space-y-6">

    <div>

        <label class="block text-sm font-medium text-gray-700 mb-2">
            Post Title
            <span class="text-red-500">*</span>
        </label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $post->title ?? '') }}"
            required
            maxlength="255"
            class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
            placeholder="Enter a clear post title"
        >

        @error('title')

            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>

        @enderror

    </div>


    <div>

        <label class="block text-sm font-medium text-gray-700 mb-2">
            Post Content
            <span class="text-red-500">*</span>
        </label>

        <textarea
            name="body"
            rows="10"
            required
            class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
            placeholder="Write your update, achievement, event, opportunity or announcement..."
        >{{ old('body', $post->body ?? '') }}</textarea>

        @error('body')

            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>

        @enderror

    </div>


    <div class="grid md:grid-cols-2 gap-6">

        <div>

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Category
            </label>

            <select
                name="category_id"
                class="w-full border-gray-300 rounded-lg"
            >

                <option value="">
                    Select category
                </option>

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        @selected(
                            old(
                                'category_id',
                                $post->category_id ?? null
                            ) == $category->id
                        )
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>

            @error('category_id')

                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>


        <div>

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Country
            </label>

            <input
                type="text"
                name="country"
                maxlength="100"
                value="{{ old('country', $post->country ?? '') }}"
                class="w-full border-gray-300 rounded-lg"
                placeholder="Example: Nepal"
            >

            @error('country')

                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>

    </div>


    <div>

        <label class="block text-sm font-medium text-gray-700 mb-2">
            WePOWER Pillar
        </label>

        <select
            name="wepower_pillar"
            class="w-full border-gray-300 rounded-lg"
        >

            <option value="">
                Select a pillar
            </option>

            @foreach($pillars as $pillar)

                <option
                    value="{{ $pillar }}"
                    @selected(
                        old(
                            'wepower_pillar',
                            $post->wepower_pillar ?? null
                        ) === $pillar
                    )
                >
                    {{ $pillar }}
                </option>

            @endforeach

        </select>

        @error('wepower_pillar')

            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>

        @enderror

    </div>


    <div class="grid md:grid-cols-2 gap-6">

        <div>

            <label class="block text-sm font-medium text-gray-700 mb-2">
                External Link
            </label>

            <input
                type="url"
                name="external_url"
                value="{{ old('external_url', $post->external_url ?? '') }}"
                class="w-full border-gray-300 rounded-lg"
                placeholder="https://example.com"
            >

            @error('external_url')

                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>


        <div>

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Video Link
            </label>

            <input
                type="url"
                name="video_url"
                value="{{ old('video_url', $post->video_url ?? '') }}"
                class="w-full border-gray-300 rounded-lg"
                placeholder="YouTube, Vimeo, etc."
            >

            @error('video_url')

                <p class="mt-1 text-sm text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>

    </div>


    <div>

        <label class="block text-sm font-medium text-gray-700 mb-2">
            Images / Documents
        </label>

        <input
            type="file"
            name="attachments[]"
            multiple
            accept=".jpg,.jpeg,.png,.webp,.pdf,.doc,.docx"
            class="block w-full border border-gray-300 rounded-lg p-3 text-sm"
        >

        <p class="text-xs text-gray-500 mt-2">
            Maximum 5 files. Maximum 2 MB per file.
        </p>


        @error('attachments')

            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>

        @enderror


        @error('attachments.*')

            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>

        @enderror

    </div>

</div>