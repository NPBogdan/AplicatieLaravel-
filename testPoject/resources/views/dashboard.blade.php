<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Ajax call-->
    <div class="container px-6 py-11">
        <div class="max-w-full sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 fs-4">
                    Your external IP address is: {{$response}}
                </div>
            </div>
        </div>
    </div>

    <!-- The forms-->
    <div class="container px-6 py-11">
        <div class="grid grid-cols-2">
            <!-- Tool form -->
            <div class="max-w-4xl sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p class="fs-2">Object</p>
                        <form method="post" action="/tools">
                            @csrf()
                            <div class="mb-3">
                                <label for="tool" class="form-label">Object name</label>
                                <input type="text" class="form-control" id="object" name="tool">
                            </div>
                            <button type="submit" class="btn btn-primary">Is ok</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Attribute form -->
            <div class="max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p class="fs-2">Attribute</p>
                        @if($userObjects->count() > 0)
                            <form method="POST" action="/attributes">
                                @csrf()
                                <div class="mb-3">
                                    <label for="tool" class="form-label">Object</label>
                                    <select class="form-control" id="tool" name="object_id">
                                        @foreach($userObjects as $object)
                                            <option value="{{$object->id}}">{{$object->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="company" class="form-label">Company</label>
                                    <input type="text" class="form-control" id="company" name="company" >
                                </div>
                                <div class="mb-3">
                                    <label for="representative_name" class="form-label">Representative Name</label>
                                    <input type="text" class="form-control" id="representative_name" name="representative_name" >
                                </div>
                                <div class="mb-3">
                                    <label for="nr_telephone_representative" class="form-label">Representative phone number</label>
                                    <input type="text" class="form-control" id="nr_telephone_representative" name="nr_telephone_representative" >
                                </div>
                                <div class="mb-3">
                                    <label for="validity_start_date" class="form-label">Validity Start Date</label>
                                    <input type="date" class="form-control" id="validity_start_date" name="validity_start_date" >
                                </div>
                                <div class="mb-3">
                                    <label for="expiration_date" class="form-label">Expiration Date</label>
                                    <input type="date" class="form-control" id="expiration_date" name="expiration_date" >
                                </div>
                                <button type="submit" class="btn btn-primary" >Finish</button>
                            </form>
                        @else
                            You must add an object in order to add an attribute!
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User objects table-->
    <p class="text-lg text-center font-bold m-5">Objects</p>
    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
        <tr class="text-left border-b-2 border-gray-300">
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Attibutes</th>
            <th class="px-4 py-3">Created</th>
        </tr>

        @foreach($userObjects as $object)
            @can('view',$object)
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="px-4 py-3">{{$object->name}}</td>
                    <td class="px-4 py-3">{{$object->attributes->count()}}</td>
                    <td class="px-4 py-3">{{$object->created_at}}</td>
                </tr>
            @endcan
        @endforeach
    </table>

    <!-- Object Attribute table-->
    <p class="text-lg text-center font-bold m-5">Attributes</p>
    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
        <tr class="text-left border-b-2 border-gray-300">
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Object</th>
            <th class="px-4 py-3">Company</th>
            <th class="px-4 py-3">Expire Date</th>
            <th class="px-4 py-3">Created</th>
        </tr>

        @foreach($userObjects as $object)
            @can('view',$object)
                @foreach($object->attributes as $attribute)
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="px-4 py-3">{{$attribute->name}}</td>
                    <td class="px-4 py-3">{{$object->name}}</td>
                    <td class="px-4 py-3">{{$attribute->company}}</td>
                    <td class="px-4 py-3">{{$attribute->expiration_date}}</td>
                    <td class="px-4 py-3">{{$attribute->created_at}}</td>
                </tr>
                @endforeach
            @endcan
        @endforeach
    </table>
</x-app-layout>
