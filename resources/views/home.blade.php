<x-layout title="Users">

    @foreach ($users as $user)
        <x-user :user="$user" />
    @endforeach

</x-layout>