<a class="card user" href="{{"users/{$user->id}"}}">
    <img src="{{ $user->img }}" alt="Profile image" />
    <div class="info">

        <div>
            <h2>{{ $user->name }}</h2>
            <h3>{{ $user->company }}</h3>
            <p>{{ $user->role }}</p>
        </div>

        <h1>{{ $user->rate }}<span>{{ $user->rate_currency }}</span></h1>

    </div>
</a>