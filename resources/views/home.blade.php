<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <title>Home</title>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Welcome to the Home Page</h1>

        <!-- Note Creation Form -->
        <form method="POST" action="{{ route('notes.store') }}" class="bg-white p-6 rounded-lg shadow-md mb-8">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" name="title" id="title" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                <textarea name="content" id="content" rows="4" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create
                Note</button>
        </form>

        <!-- Display Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Display Notes -->
        <h2 class="text-2xl font-bold mb-4">Your Notes</h2>
        @if ($notes->isEmpty())
            <p class="text-gray-600">No notes found.</p>
        @else
            <ul class="list-disc pl-5">
                @foreach ($notes as $note)
                    <li class="mb-4 flex items-start justify-between">
                        <div>
                            <h3 class="text-xl font-semibold mb-2">{{ $note->title }}</h3>
                            <p class="text-gray-800">{{ $note->content }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('notes.edit', $note->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline">Edit</a>
                            <form method="POST" action="{{ route('notes.destroy', $note->id) }}"
                                onsubmit="return confirm('Are you sure you want to delete this note?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('logout') }}" class="mt-8">
            @csrf
            <button type="submit"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Logout</button>
        </form>
    </div>

</body>

</html>
