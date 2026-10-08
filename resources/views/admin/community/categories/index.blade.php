@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-10">

    <div class="mb-8">

        <h1 class="text-2xl font-bold text-gray-900">
            Community Categories
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Manage categories available to contributors.
        </p>

    </div>


    @if(session('success'))

        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
            {{ session('error') }}
        </div>

    @endif


    <div class="grid lg:grid-cols-3 gap-6">

        <div>

            <div class="bg-white rounded-xl shadow p-6">

                <h2 class="font-semibold text-gray-800 mb-5">
                    Add Category
                </h2>


                <form
                    method="POST"
                    action="{{ route('admin.community.categories.store') }}"
                >

                    @csrf


                    <div class="mb-4">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Category Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="w-full border-gray-300 rounded-lg"
                            required
                        >

                    </div>


                    <div class="mb-5">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="4"
                            class="w-full border-gray-300 rounded-lg"
                        >{{ old('description') }}</textarea>

                    </div>


                    <button
                        class="w-full bg-blue-600 text-white py-2.5 rounded-lg hover:bg-blue-700"
                    >
                        Add Category
                    </button>

                </form>

            </div>

        </div>


        <div class="lg:col-span-2">

            <div class="bg-white rounded-xl shadow overflow-hidden">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">

                        <tr>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                Category
                            </th>

                            <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">
                                Status
                            </th>

                            <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y">

                        @forelse($categories as $category)

                            <tr>

                                <td class="px-6 py-4">

                                    <div class="font-medium text-gray-800">
                                        {{ $category->name }}
                                    </div>

                                    <div class="text-sm text-gray-500 mt-1">
                                        {{ $category->description }}
                                    </div>

                                </td>


                                <td class="px-6 py-4 text-center">

                                    @if($category->is_active)

                                        <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">
                                            Active
                                        </span>

                                    @else

                                        <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">
                                            Disabled
                                        </span>

                                    @endif

                                </td>


                                <td class="px-6 py-4 text-center">

                                    <form
                                        class="inline"
                                        method="POST"
                                        action="{{ route('admin.community.categories.toggle', $category) }}"
                                    >

                                        @csrf

                                        <button
                                            class="text-blue-600 text-sm hover:underline"
                                        >
                                            {{ $category->is_active ? 'Disable' : 'Enable' }}
                                        </button>

                                    </form>


                                    <form
                                        class="inline ml-4"
                                        method="POST"
                                        action="{{ route('admin.community.categories.destroy', $category) }}"
                                        onsubmit="return confirm('Delete this category?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="text-red-600 text-sm hover:underline"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="3"
                                    class="px-6 py-10 text-center text-gray-500">

                                    No categories created yet.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection