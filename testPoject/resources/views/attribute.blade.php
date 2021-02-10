<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Ajax call-->
    <div class="container px-6 py-11">
        <div class="content-center">Your external IP address is : {{$response}}</div>
    </div>

    <!-- User objects-->
    <div class="container px-6 py-11">
        <table>
            <thead>
            Your objects are:
            </thead>
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

    <!-- The forms-->
    <div class="container px-6 py-11">
        <div class="grid grid-cols-2">
            <!-- Tool form -->
            <div class="max-w-4xl sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="post" action="/tools">
                            @csrf()
                            <div class="mb-3">
                                <label for="tool" class="form-label">Tool</label>
                                <input type="text" class="form-control" id="object" name="tool" disabled>
                            </div>
                            <button type="submit" class="btn btn-primary" disabled>Is ok</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Attribute form -->
            <div class="max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="POST" action="/attributes">
                            @csrf()
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" >
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
