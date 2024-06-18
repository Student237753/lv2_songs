<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new song</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white">
    <header class="bg-[#1ed760] p-4 text-center">
        <h1 class="text-white font-bold text-xl">Create new song</h1>
    </header>

    <main class="p-4 mt-16">
        <form action="{{ route('songs.store') }}" method="POST" class="max-w-md mx-auto">
            @csrf
            <div class="mb-4">
                <label for="title" class="block mb-2 font-bold">Title of song:</label>
                <input type="text" id="title" name="title" placeholder="Enter new song name" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>

            <div class="mb-4">
                <label for="singer" class="block mb-2 font-bold">Artist:</label>
                <input type="text" id="singer" name="singer" placeholder="Enter name of artist" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>

            <div class="mb-4">
                <label for="release_date" class="block mb-2 font-bold">Release Date:</label>
                <input type="number" id="release_date" name="release_date" placeholder="Enter release year" min="1900"
                    max="{{ date('Y') }}" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">Select Albums:</label>
                @foreach ($albums as $album)
                    <div>
                        <input type="checkbox" id="album_{{ $album->id }}" name="album[]" value="{{ $album->id }}">
                        <label for="album_{{ $album->id }}">{{ $album->name }}</label><br> 
                    </div>
                @endforeach
            </div>

            <div class="flex justify-between">
                <a href="{{ route('songs.index') }}"
                    class="btn bg-[#1ed760] hover:bg-[#1ed760] rounded-lg py-2 px-4 font-bold">Back</a>
                <button type="submit"
                    class="btn bg-[#1ed760] hover:bg-[#1ed760] rounded-lg py-2 px-4 font-bold">Create</button>
            </div>
        </form>
    </main>

    <footer class="bg-[#1ED760] text-white p-4 text-center w-full font-bold">
        &copy; 2024 Songs Website. All rights reserved.
    </footer>
</body>

</html>