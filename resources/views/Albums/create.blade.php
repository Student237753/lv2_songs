<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new album</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white">
    <header class="bg-[#1ed760] p-4 text-center">
        <h1 class="text-white font-bold text-xl">Create new album</h1>
    </header>

    <main class="p-4 mt-16">
        <form action="{{ route('albums.store') }}" method="POST" class="max-w-md mx-auto">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-2 font-bold">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter album name" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>

            <div class="mb-4">
                <label for="band" class="block mb-2 font-bold">Band:</label>
                <select id="band" name="band_id" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
                    <option value="" disabled selected>Select Band</option>
                    @foreach($bands as $band)
                        <option value="{{ $band->id }}">{{ $band->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="year" class="block mb-2 font-bold">Year:</label>
                <input type="number" id="year" name="year" placeholder="Enter release year" min="1900"
                    max="{{ date('Y') }}" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>

            <div class="flex justify-between">
                <a href="{{ route('albums.index') }}"
                    class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4 font-bold">Back</a>
                <button type="submit"
                    class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4 font-bold">Create</button>
            </div>
        </form>
    </main>

    <footer class="bg-[#1ed760] text-white p-4 text-center fixed bottom-0 w-full font-bold ">
        &copy; 2024 Bands Website. All rights reserved.
    </footer>
</body>

</html>
