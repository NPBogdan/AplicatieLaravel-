<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- User objects table-->
    <p class="text-lg text-center font-bold m-5">Notifications</p>
    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
        <tr class="text-left border-b-2 border-gray-300">
            <th class="px-4 py-3">Data</th>
            <th class="px-4 py-3">Details</th>
            <th class="px-4 py-3">Created</th>
        </tr>
    </table>
</x-app-layout>
