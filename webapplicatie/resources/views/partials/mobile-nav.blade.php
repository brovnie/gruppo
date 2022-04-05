@auth
<div>
    <div>
        <a href="/index">Home</a>
    </div>
    <div>
        <a href="/events">Active Events</a>
    </div>
    <div>
        <a href="/notifications">Notifications</a>
    </div>
    <div>
        <a href="/profiles/{{ Auth::user()->username }}">Profiles</a>
    </div>
</div>

@endauth
