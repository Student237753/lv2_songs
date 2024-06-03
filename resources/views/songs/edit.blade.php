<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Song - {{ $song->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white">
    <header class="bg-[#1ed760] p-4 text-center">
        <h1 class="text-white font-bold">Editing Song - {{ $song->title }}</h1>
    </header>
    <main class="p-4 mt-16">
        <form action="{{ route('songs.update', $song->id) }}" method="POST" class="max-w-md mx-auto">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block mb-2 font-bold">Song:</label>
                <input type="text" id="title" name="title" value="{{ $song->title }}" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>
            <div class="mb-4">
                <label for="singer" class="block mb-2 font-bold">Artist:</label>
                <input type="text" id="singer" name="singer" value="{{ $song->singer }}" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>
            <div class="mb-4">
                <label for="release_date" class="block mb-2 font-bold">Release Date:</label>
                <input type="number" id="release_date" name="release_date" value="{{ $song->release_date }}" placeholder="Enter release year"
                    min="1900" max="{{ date('Y') }}" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>
            <div class="flex justify-between">
                <a href="{{ route('songs.index') }}" class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4 font-bold">Back</a>
                <button type="submit" class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4 font-bold">Update Song</button>
            </div>
        </form>
    </main>
    <footer class="bg-[#1ed760] text-white p-4 text-center fixed bottom-0 w-full font-bold">
        &copy; 2024 Songs Website. All rights reserved.
    </footer>
</body>

</html>
