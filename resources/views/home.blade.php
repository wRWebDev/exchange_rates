<x-layout>

    <x-slot name="header">
        Home
    </x-slot>

    @foreach ($users as $user)
        <x-user :user="$user" />
    @endforeach

</x-layout>