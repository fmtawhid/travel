<aside class="w-64 bg-white border-r min-h-screen p-6">
    <div class="mb-8">
        <div class="text-xl font-semibold">Menu</div>
    </div>

    <nav class="space-y-2">
        <a href="{{ url()->current() }}" class="block px-3 py-2 rounded hover:bg-gray-100">Dashboard</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-3 py-2 rounded hover:bg-gray-100">Logout</button>
        </form>
    </nav>
</aside>
