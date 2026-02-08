<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex">
        @include('partials.sidebar')

        <div class="flex-1 bg-gray-100">
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                    <h1 class="text-3xl font-bold">Admin Dashboard</h1>
                    <div class="text-sm">Welcome, {{ auth()->user()->name ?? 'Admin' }}</div>
                </div>
            </header>

            <main class="p-6 max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-xl font-semibold">Users</h2>
                        <p class="mt-2 text-sm text-gray-600">Manage site users and roles.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-xl font-semibold">Tours</h2>
                        <p class="mt-2 text-sm text-gray-600">Overview and manage tours.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-xl font-semibold">Settings</h2>
                        <p class="mt-2 text-sm text-gray-600">Site configuration and options.</p>
                    </div>
                </div>

                <section class="mt-8 bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-medium">Quick Actions</h3>
                    <div class="mt-4 flex gap-3">
                        <a href="#" class="px-4 py-2 bg-indigo-600 text-white rounded">Create Tour</a>
                        <a href="#" class="px-4 py-2 bg-green-600 text-white rounded">Add User</a>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>
</html>
