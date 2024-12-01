<div class="relative overflow-x-auto rounded-md">
    <table class="w-full text-left text-sm text-gray-500">
    <thead class="bg-gray-50 text-xs uppercase text-gray-700">
    <tr class="border-b border-gray-100">
        <th scope="col" class="px-6 py-5">
            Privileges
        </th>
        <th scope="col" class="px-6 py-5">View</th>
        <th scope="col" class="px-6 py-5">Edit</th>
        <th scope="col" class="px-6 py-5">Full</th>
    </tr>
    </thead>
    <tbody>
    @foreach($permissionGroups as $key => $permissionGroup)
        @foreach($permissionGroup as $item)
            <tr class="border-b bg-white">
                <th scope="row"
                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">{{$item->name}}</th>
                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                    <input class="h-4 w-4 rounded border border-gray-300 focus:ring-3 focus:ring-indigo-300"
                           type="checkbox"
                           aria-label="view"
                           id="view{{ $item->id }}"
                           name="permissions[{{$item->id}}][view]"
                    @isset($role)
                        @checked($item?->rolePrivilege($role->id)->first()?->view)
                            @endisset
                    >
                </td>
                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                    <input class="h-4 w-4 rounded border border-gray-300 focus:ring-3 focus:ring-indigo-300"
                           type="checkbox"
                           id="edit{{ $item->id }}"
                           name="permissions[{{$item->id}}][edit]"
                           aria-label="edit"
                        @isset($role)
                            @checked($item?->rolePrivilege($role->id)->first()?->edit)
                        @endisset
                    >
                </td>
                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                    <input class="h-4 w-4 rounded border border-gray-300 focus:ring-3 focus:ring-indigo-300"
                           type="checkbox"
                           id="full{{$item->id}}"
                           name="permissions[{{$item->id}}][full]"
                           aria-label="full"
                            @checked($item?->rolePrivilege?->full)
                    @isset($role)
                        @checked($item?->rolePrivilege($role->id)->first()?->full)
                            @endisset
                    >
                </td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>
</div>
