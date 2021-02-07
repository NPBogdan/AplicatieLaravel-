<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{$response}}
    <div class="py-12">
        <div class="grid grid-cols-2">
            <div class="max-w-4xl sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="post" action="/tools">
                            @csrf()
                            <div class="mb-3">
                                <label for="tool" class="form-label">Object</label>
                                <input type="text" class="form-control" id="object" name="tool">
                            </div>
                            <button type="submit" class="btn btn-primary">Is ok</button>
                        </form>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="border-collapse border border-green-800 ">
                        <tbody>
                            @foreach($userObjects as $object)
                                @can('view',$object)
                                    <tr>
                                        <td class="border border-green-600">{{$object->name}}</td>
                                    </tr>
                                @endcan
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="max-w-4xl sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="post" action="/tools">
                            @csrf()
                            <div class="mb-3">
                                <label for="tool" class="form-label">Tool</label>
                                <input type="text" class="form-control" id="object" name="tool">
                            </div>
                            <button type="submit" class="btn btn-primary">Is ok</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
