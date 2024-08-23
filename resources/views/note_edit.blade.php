<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <title>Edit Note</title>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Edit Note</h1>

        <!-- Note Edit Form -->
        <form method="POST" action="{{ route('notes.update', $note->id) }}"
            class="bg-white p-6 rounded-lg shadow-md mb-8">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $note->title) }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                <textarea name="content" id="content" rows="4" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('content', $note->content) }}</textarea>
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update
                Note</button>
        </form>

        <!-- Back Button -->
        <a href="{{ route('home') }}"
            class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back
            to Home</a>
    </div>

</body>

</html>
