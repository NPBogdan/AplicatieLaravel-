<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if($notifications->count() > 0)
    <!-- User objects table-->
    <p class="text-lg text-center font-bold m-5">Notifications</p>
    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
        <tr class="text-left border-b-2 border-gray-300">
            <th class="px-4 py-3">Date</th>
            <th class="px-4 py-3">Message</th>
        </tr>
        @foreach($notifications as $notification)
            <tr class="text-left border-b-2 border-gray-300 {{ $notification->read_at ? 'bg-green-100' : '' }}">
                <th class="px-4 py-3">{{$notification->created_at}}</th>
                <th class="px-4 py-3">Your attribute {{$notification->data['name']}} from company {{$notification->data['company']}} has expired!</th>
            </tr>
        @endforeach
    </table>
    @else
        You don't have notifications.
    @endif
</x-app-layout>
