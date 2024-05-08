<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-semibold mb-4">Category</h2>
                    <!-- Form -->
                    <form action="{{ url('category/create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Name field -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                required>
                        </div>
                        <!-- Description field -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="my-editor" name="description" rows="3"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                required></textarea>
                        </div>

                        <!-- Image field using Laravel File Manager standalone button -->
                        <div class="relative flex items-center">
                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                            <input id="thumbnail"
                                class="border border-gray-300 px-2 py-1 rounded-md ml-2 w-64 focus:outline-none focus:ring focus:border-blue-300"
                                type="text" name="image">
                        </div>
                        <div id="holder" class="mt-4 max-h-32 overflow-y-auto"></div>

                        <!-- Submit button -->
                        <div class="mt-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Include CKEditor script -->
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<!-- Include Laravel File Manager script -->
<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

<script>
    var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}'
        };

        CKEDITOR.replace('my-editor', options);
</script>

<script>
    $('#lfm').filemanager();
</script>