@extends('admin.layouts.master')

@section('content')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Form Layout
    </h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Layout -->
        <form class="intro-y box p-5" action={{route('admin.product.update', ['id' => $product->id])}} method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="mt-3">
                <label>Upload Image</label>
                <div class="relative mt-2">
                    <input type="file" name="image" id="imageUpload" class="input w-full border col-span-4" accept="image/*" style="padding-right: 12px;">
                    <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">IMG</div>
                </div>
                <div class="mt-2" id="previewContainer">
                    <label>Preview</label>
                    <div class="mt-1">
                        <img id="imagePreview" src={{ $product->thumbnail_url }} alt="Image preview" class="max-w-full h-auto">
                    </div>
                </div>
            </div>

            <script>
                document.getElementById('imageUpload').addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const preview = document.getElementById('imagePreview');
                            preview.src = e.target.result;
                            document.getElementById('previewContainer').style.display = 'block';
                        };
                        reader.readAsDataURL(file);
                } else {
                        document.getElementById('previewContainer').style.display = 'none';
                    }
                });
            </script>

            <div class="mt-3">
                <label>Product Name</label>
                <input value={{ $product->name }} name="name" type="text" class="input w-full border mt-2" placeholder="Input text">
            </div>
            <div class="mt-3">
                <label>Quantity</label>
                <div class="relative mt-2">
                    <input value={{ $product->quantity }}  name="quantity" type="text" class="input pr-12 w-full border col-span-4" placeholder="Price">
                    <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">pcs</div>
                </div>
            </div>
            <div class="mt-3">
                <label>Price</label>
                <div class="">
                    <div class="relative mt-2">
                        <div class="absolute top-0 left-0 rounded-l w-12 h-full flex items-center justify-center bg-gray-100 border text-gray-600">Unit</div>
                        <div class="pl-12">
                            <input value={{ $product->price }} name="price" type="text" class="input pl-12 w-full border col-span-4" placeholder="Price">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <label>Active Status</label>
                <div class="mt-2">
                    @if($product->is_active)
                        <input name="is_active" type="checkbox" class="input input--switch border" checked>
                    @else
                        <input name="is_active" type="checkbox" class="input input--switch border">
                    @endif
                </div>
            </div>
            <div class="mt-3">
                <label>Textarea</label>
                <div class="mt-2">
                    <textarea name="description" data-feature="basic" class="summernote" name="editor">{{ $product->description }}</textarea>
                </div>
            </div>
            <div class="text-right mt-5">
                <button type="button" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
            </div>
        </form>
        <!-- END: Form Layout -->
    </div>
</div>
@endsection
