@extends('admin.layouts.master')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Affiliate Links
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">ID</th>
                        <th class="whitespace-no-wrap">IMAGES</th>
                        <th class="whitespace-no-wrap">PRODUCT NAME</th>
                        <th class="text-center whitespace-no-wrap">CLICKS</th>
                        <th class="text-center whitespace-no-wrap">REVENUE</th>
                        <th class="text-center whitespace-no-wrap">STATUS</th>
                        <th class="text-center whitespace-no-wrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($affiliates as $index => $affiliate)
                        <tr class="intro-x">
                            <td class="w-10">
                                <div
                                class="flex items-center justify-center">
                                    {{ $affiliate->id }}
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full"
                                            src={{ $affiliate->product->thumbnail_url }} title="Uploaded at 17 July 2021">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href={{route('products.show', ['product' => $affiliate->product])}} target="_blank" class="font-medium whitespace-no-wrap">{{ $affiliate->product->name }}</a>
                            </td>
                            <td class="text-center">{{ $affiliate->clicks()->count() }}</td>
                            <td class="text-center">{{ $affiliate->totalSales }}</td>
                            <td class="w-40">
                                <div
                                    class="flex items-center justify-center {{ $affiliate->product->is_active ? 'text-theme-9' : 'text-theme-6' }}">
                                    <i data-feather="check-square" class="w-4 h-4 mr-2"></i>
                                    {{ $affiliate->product->is_active ? 'Active' : 'Inactive' }}
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="#" onclick="copyToClipboard(event, '{{ $affiliate->link }}')">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Get
                                    </a>
                                    <script>
                                        function copyToClipboard(event, link) {
                                            event.preventDefault(); // Prevent the default anchor action
                                            const linkee ='localhost:8000/affiliate/' + link

                                            // Copy the link to the clipboard
                                            navigator.clipboard.writeText(linkee).then(function() {
                                                alert('Copied to clipboard: ' + linkee); // Show an alert with the link
                                            }, function(err) {
                                                console.error('Could not copy text: ', err); // Log an error if there was a problem
                                            });
                                        }
                                        </script>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
            <ul class="pagination">
                @if ($affiliates->onFirstPage())
                    <li class="disabled"><span><i class="w-4 h-4" data-feather="chevrons-left"></i></span></li>
                @else
                    <li><a class="pagination__link" href="{{ $affiliates->previousPageUrl() }}"><i class="w-4 h-4"
                                data-feather="chevrons-left"></i></a></li>
                @endif

                {{-- Previous Page Link --}}
                @if ($affiliates->currentPage() > 1)
                    <li><a class="pagination__link" href="{{ $affiliates->previousPageUrl() }}"><i class="w-4 h-4"
                                data-feather="chevron-left"></i></a></li>
                @endif

                {{-- Pagination Elements --}}
                {{-- Here you're supposed to render the pages, you might need a custom logic to display a specific range of links --}}

                {{-- Next Page Link --}}
                @if ($affiliates->hasMorePages())
                    <li><a class="pagination__link" href="{{ $affiliates->nextPageUrl() }}"><i class="w-4 h-4"
                                data-feather="chevron-right"></i></a></li>
                @else
                    <li class="disabled"><span><i class="w-4 h-4" data-feather="chevron-right"></i></span></li>
                @endif

                {{-- Last Page Link --}}
                <li><a class="pagination__link" href="{{ $affiliates->url($affiliates->lastPage()) }}"><i class="w-4 h-4"
                            data-feather="chevrons-right"></i></a></li>
            </ul>
            {{-- Page Size Selection Should Be Handled Separately --}}
            <form method="GET" action="{{ route('admin.product.list') }}">
                <select class="w-20 input box mt-3 sm:mt-0" onchange="this.form.submit()" name="perPage">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="35">35</option>
                    <option value="50">50</option>
                </select>
            </form>
        </div>
        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div class="modal" id="delete-confirmation-modal">
        <div class="modal__content">
            <div class="p-5 text-center">
                <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                <div class="text-3xl mt-5">Are you sure?</div>
                <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.
                </div>
            </div>
            <div class="px-5 pb-8 text-center">

                <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                <button type="button" class="button w-24 bg-theme-6 text-white">Delete</button>
            </div>
        </div>
    </div>
@endsection
