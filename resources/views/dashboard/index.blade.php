<x-app-layout>
    <x-slot name="title">Staff Management</x-slot>
    <div class="w-full" x-data="data">
        <div class="grid w-full grid-cols-1 space-y-5 rounded-lg border border-gray-200 bg-white py-6">



        </div>
        @include('dialogs.success')
        @include('components.modals.confirm')

    </div>

</x-app-layout>
