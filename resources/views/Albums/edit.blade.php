<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Album - {{ $album->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white">
    <header class="bg-[#1ed760] p-4 text-center">
        <h1 class="text-white font-bold">Editing Album - {{ $album->name }}</h1>
    </header>
    <main class="p-4 mt-16">
        <form action="{{ route('albums.update', $album->id) }}" method="POST" class="max-w-md mx-auto">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block mb-2 font-bold">Album Name:</label>
                <input type="text" id="name" name="name" value="{{ $album->name }}" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>
            <div class="mb-4">
                <label for="year" class="block mb-2 font-bold">Release Year:</label>
                <input type="number" id="year" name="year" value="{{ $album->year }}" placeholder="Enter release year"
                    min="1900" max="{{ date('Y') }}" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>
            <div class="mb-4">
                <label for="band" class="block mb-2 font-bold">Band:</label>
                <select id="band" name="band" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
                    @foreach ($bands as $band)
                        <option value="{{ $band->id }}" {{ $album->band_id == $band->id ? 'selected' : '' }}>
                            {{ $band->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="songs" class="block mb-2 font-bold">Add Songs:</label>
                <select id="songs" name="songs[]" multiple
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
                    @foreach ($songs as $song)
                        <option value="{{ $song->id }}" {{ in_array($song->id, $album->songs->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $song->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-between">
                <a href="{{ route('albums.index') }}"
                    class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4 font-bold">Back</a>
                <button type="submit"
                    class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4 font-bold">Update Album</button>
            </div>
        </form>
    </main>
    <footer class="bg-[#1ed760] text-white p-4 text-center fixed bottom-0 w-full font-bold">
        &copy; 2024 Songs Website. All rights reserved.
    </footer>
</body>

</html>
