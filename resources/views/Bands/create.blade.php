<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new band</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white">
    <header class="bg-[#1ed760] p-4 text-center">
        <h1 class="text-white font-bold text-xl">Create new band</h1>
    </header>

    <main class="p-4 mt-16">
        <form action="{{ route('bands.store') }}" method="POST" class="max-w-md mx-auto">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-2 font-bold">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter band name" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>

            <div class="mb-4">
                <label for="genre" class="block mb-2 font-bold">Genre:</label>
                <input type="text" id="genre" name="genre" placeholder="Enter genre" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>

            <div class="mb-4">
                <label for="founded" class="block mb-2 font-bold">Founded:</label>
                <input type="number" id="founded" name="founded" placeholder="Enter founded year" min="1900"
                    max="{{ date('Y') }}" required
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>

            <div class="mb-4">
                <label for="active_till" class="block mb-2 font-bold">Active Till:</label>
                <input type="number" id="active_till" name="active_till" placeholder="Enter active till year" min="1900"
                    max="{{ date('Y') }}"
                    class="w-full px-4 py-2 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring focus:ring-[#1ed760]">
            </div>

            <div class="flex justify-between">
                <a href="{{ route('bands.index') }}"
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
