<x-app-layout>
    <x-slot name="title">Create Role</x-slot>
    <div class="w-full">
        <div class="relative mt-5">
            <form method="post" action="{{ route('roles.store') }}">
                @csrf
                <div class="w-full rounded-lg border border-gray-200 bg-white py-24 sm:px-6 sm:py-32 pb-10">
                    <div class="mx-auto max-w-xl">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Create new role</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">This information will be used to assign the staff.</p>
                        <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 space-y-8 border-b border-gray-200 gap-x-6 pb-12">
                            <div class="col-span-full">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Role Name</label>
                                <input type="text"
                                       class="@if($errors->has('name')) ring-red-300 text-red-900 focus:ring-red-600 @else ring-gray-300 text-gray-900 focus:ring-indigo-600 @endif block w-full rounded-md border-0 py-2.5 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                       id="name" name="name" value="{{ old('name') }}" required/>
                                @if($errors->has('name'))
                                    <p class="mt-2 text-xs text-red-600">
                                        <span class="font-medium">{{$errors->first('name')}}</span>
                                    </p>
                                @endif
                            </div>

                            <div class="col-span-full">
                                <label for="remark" class="block text-sm font-medium leading-6 text-gray-900">Remark</label>
                                <textarea id="remark"
                                          class="@if($errors->has('remark')) ring-red-300 text-red-900 focus:ring-red-600 @else ring-gray-300 text-gray-900 focus:ring-indigo-600 @endif block w-full rounded-md border-0 py-2.5 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                          name="remark">{{ old('remark') }}</textarea>
                                @if($errors->has('remark'))
                                    <p class="mt-2 text-xs text-red-600">
                                        <span class="font-medium">{{ $errors->first('remark') }}</span>
                                    </p>
                                @endif
                            </div>


                            <div class="col-span-full">
                                @if($errors->has('permissions'))
                                    <p class="mb-2 text-xs text-red-600">
                                        <span class="font-medium">{{ $errors->first('permissions') }}</span>
                                    </p>
                                @endif

                                <div class="border border-gray-200 rounded-md">
                                    @include('role.permission')
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('roles.index') }}"
                               class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-medium text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:w-24">
                                Back
                            </a>
                            <button type="submit"
                                    class="inline-flex w-24 justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm text-white shadow-sm hover:bg-indigo-500">
                                Create
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
