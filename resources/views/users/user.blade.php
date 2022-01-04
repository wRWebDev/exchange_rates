<x-layout title="User">

    @foreach ($users as $user)
        <x-user :user="$user" />
    @endforeach

</x-layout>