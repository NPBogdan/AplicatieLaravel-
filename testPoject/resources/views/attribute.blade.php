<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/attributes">
                        @csrf()
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" class="form-control" id="company" name="company">
                        </div>
                        <div class="mb-3">
                            <label for="representative_name" class="form-label">Representative Name</label>
                            <input type="text" class="form-control" id="representative_name" name="representative_name">
                        </div>
                        <div class="mb-3">
                            <label for="nr_telephone_representative" class="form-label">Representative phone number</label>
                            <input type="text" class="form-control" id="nr_telephone_representative" name="nr_telephone_representative">
                        </div>
                        <div class="mb-3">
                            <label for="validity_start_date" class="form-label">Validity Start Date</label>
                            <input type="date" class="form-control" id="validity_start_date" name="validity_start_date">
                        </div>
                        <div class="mb-3">
                            <label for="expiration_date" class="form-label">Expiration Date</label>
                            <input type="date" class="form-control" id="expiration_date" name="expiration_date">
                        </div>
                        <button type="submit" class="btn btn-primary">Finish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
