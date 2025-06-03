<x-layouts.app>
    <div
        class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
        <div class="p-6">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Form Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <h3
                            class="text-lg font-medium text-gray-800 dark:text-gray-200 border-b border-gray-200 dark:border-gray-700 pb-2">
                            Create Post</h3>

                        <div>
                            <x-forms.input label="Title" name="title" placeholder="Enter title" />
                        </div>
                        <div>
                            <x-forms.textarea label="Content" name="post" placeholder="Enter content" />
                        </div>
                        <div>
                            <x-forms.select label="Category" name="category" placeholder="Enter category"
                                :options="$categories" />
                        </div>
                        <div>
                            <x-forms.input label="Image" name="image" type="file" placeholder="Enter image" />
                        </div>
                        <div>
                            <x-forms.input label="Tags" name="tags" placeholder="Enter tags" />
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Separate tags with commas
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-8 pt-5 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('admin.posts.index') }}"
                            class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <x-button type="primary" tag="button" buttonType="submit">
                            Create Post
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
