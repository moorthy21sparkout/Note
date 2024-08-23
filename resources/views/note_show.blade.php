<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <title>View Note</title>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Note Details</h1>

        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-2xl font-bold mb-4">{{ $note->title }}</h2>
            <p class="text-gray-800">{{ $note->content }}</p>
        </div>

        <div class="flex justify-between items-center mb-8">
            <a href="{{ route('home') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back
                to Home</a>

            <form method="POST" action="{{ route('notes.destroy', $note->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                    onclick="return confirm('Are you sure you want to delete this note?')"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete
                    Note</button>
            </form>
        </div>
    </div>
</body>

</html>
