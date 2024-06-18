<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Band - {{ $band->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white">
    <header class="bg-[#1ed760] p-4 text-center">
        <h1 class="text-white font-bold">Editing Band - {{ $band->name }}</h1>
    </header>
    <main class="p-4 mt-16">
        <form action="{{ route('bands.update', $band->id) }}" method="POST" class="max-w-md mx-auto">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block mb-2 font-bold">Band Name:</label>
                <input type="text" id="name" name="name" value="{{ $band->name }}" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>
            <div class="mb-4">
                <label for="genre" class="block mb-2 font-bold">Genre:</label>
                <input type="text" id="genre" name="genre" value="{{ $band->genre }}" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>
            <div class="mb-4">
                <label for="founded" class="block mb-2 font-bold">Founded:</label>
                <input type="text" id="founded" name="founded" value="{{ $band->founded }}" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>
            <div class="mb-4">
                <label for="active_till" class="block mb-2 font-bold">Active Till:</label>
                <input type="number" id="active_till" name="active_till" value="{{ $band->active_till }}" placeholder="Leave empty for 'Still active'" 
                    min="1900" max="2024"
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>

            <div class="flex justify-between">
                <a href="{{ route('bands.index') }}" class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4 font-bold">Back</a>
                <button type="submit" class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4 font-bold">Update Band</button>
            </div>
        </form>
    </main>
    <footer class="bg-[#1ed760] text-white p-4 text-center fixed bottom-0 w-full font-bold">
        &copy; 2024 Songs Website. All rights reserved.
    </footer>
</body>
</html>
