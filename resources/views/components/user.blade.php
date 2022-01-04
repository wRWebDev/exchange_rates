<div class="card user">
    <img src="{{ $user->img }}" alt="Profile image" />
    <div class="info">

        <div>
            <h3>{{ $user->name }}</h3>
            <h4>{{ $user->company }}</h4>
        </div>

        <h2>{{ $user->hourly_rate }}<span>{{ $user->rate_currency }}</span></h2>

    </div>
</div>