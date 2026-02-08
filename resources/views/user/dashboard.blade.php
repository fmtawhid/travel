<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-white to-gray-50 text-gray-900">
    <div class="min-h-screen flex">
        @include('partials.sidebar')

        <div class="flex-1 bg-gradient-to-b from-white to-gray-50">
            <header class="w-full bg-white shadow">
                <div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                    <h1 class="text-2xl font-bold">Your Dashboard</h1>
                    <div class="text-sm">Hello, {{ auth()->user()->name ?? 'User' }}</div>
                </div>
            </header>

            <main class="flex-1 w-full max-w-4xl mx-auto p-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold">Upcoming Tours</h2>
                    <p class="mt-2 text-sm text-gray-600">Here are the tours you have booked or created.</p>

                    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="p-4 border rounded">
                            <div class="font-medium">Chittagong Hills</div>
                            <div class="text-sm text-gray-500">Starts: 2026-03-10</div>
                        </div>
                        <div class="p-4 border rounded">
                            <div class="font-medium">Sundarbans Day Trip</div>
                            <div class="text-sm text-gray-500">Starts: 2026-04-02</div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
