<x-app-layout>
    <x-slot name="title">Create Client</x-slot>
    <div class="flex w-full justify-center">
        <div class="flex w-full max-w-2xl flex-col space-y-5">
            <h1 class="col-span-full text-lg font-bold leading-tight tracking-tight text-gray-900">
                Create New Client
            </h1>
            <div class="rounded-md border border-gray-200">
                <form class="mt-5 bg-white shadow-sm ring-1 ring-gray-900/5 md:col-span-2 md:mt-0 md:rounded-xl" enctype="multipart/form-data" method="post" action="{{ route('portal.clients.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 p-6 space-y-6">
                        <div class="col-span-full">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div class="mt-2">
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                       class="@if($errors->has('name')) ring-red-300 text-red-900 focus:ring-red-600 @else ring-gray-300 text-gray-900 focus:ring-indigo-600 @endif block w-full rounded-md border-0 py-2.5 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                       required/>
                            </div>
                            @if($errors->has('name'))
                                <p id="name_error_help" class="mt-2 text-xs text-red-600">
                                    <span class="font-medium">{{$errors->first('name')}}</span>
                                </p>
                            @endif
                        </div>

                        <div class="col-span-full">
                            <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                            <div class="mt-2">
                                <input type="file" id="image" name="image" value="{{ old('image') }}"
                                       class="@if($errors->has('name')) ring-red-300 text-red-900 focus:ring-red-600 @else ring-gray-300 text-gray-900 focus:ring-indigo-600 @endif block w-full rounded-md border-0 py-2.5 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                       required/>
                            </div>
                            @if($errors->has('image'))
                                <p id="name_error_help" class="mt-2 text-xs text-red-600">
                                    <span class="font-medium">{{$errors->first('image')}}</span>
                                </p>
                            @endif
                        </div>

                    </div>

                    <div class="col-span-full flex justify-end gap-x-6 rounded-b-md bg-gray-50 px-4 py-3">
                        <a href="{{ route('portal.heading-banners.index') }}"
                           class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-medium text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:w-24">
                            Cancel
                        </a>
                        <button type="submit"
                                class="inline-flex w-24 justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm text-white shadow-sm hover:bg-indigo-500">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
