<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
        <a href="{{ route('permissions.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2  ">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>

        <table class="w-full">
            <thead class="bg-gray-50">
                <tr class="border-b bg-red-500">
                    <th class="px-6 py-3 text-left" style="width: 60px;">#</th>
                  <th class="px-6 py-3 text-left" style="width: auto;">Name</th>
                   <th class="px-6 py-3 text-left" style="width: 200px;">Created</th>
                   <th class="px-6 py-3 text-center" >Action</th>

            </thead>
            <tbody class="bg-white"
                @if($permissions ->isNotEmpty())
                @foreach ($permissions as $permission)
                <tr class="border-b">
                    <td class="px-6 py-3 text-left">
                        {{
                            $permission->id
                        }}
                    </td>

                    <td class="px-6 py-3 text-left">{{
                        $permission->name
                    }}</td>

                    <td class="px-6 py-3 text-left">{{
                        \Carbon\Carbon::parse($permission->created_at)->format('d M Y')
                    }}</td>

                    <td class="px-6 py-3 text-center">
                        <a href="{{ route("permissions.edit", $permission->id)}}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2   hover:bg-slate-600">Edit</a>

                        <a href="#" class="bg-red-600 text-sm rounded-md text-white px-3 py-2   hover:bg-red-500">Delete</a>


                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>

        </table>
        <div class="my-3">
        {{
            $permissions->links()
        }}
        </div>
        </div>
    </div>
</x-app-layout>