<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $song->title }} - Song Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white">
    <header class="bg-[#1ed760] p-4 text-center">
        <h1 class="text-white font-bold text-xl">Song Details - {{ $song->title }}</h1>
    </header>
    <main class="p-4 mt-16">
        <section class="p-4 border border-gray-500">
            <h1 class="text-xl font-bold text-center">Current Song: {{ $song->title }}</h1>
            <p class="mt-2"><strong>Artist:</strong> {{ $song->singer }}</p>
            <p><strong>ID:</strong> {{ $song->id }}</p>
            <p><strong>Release Date:</strong> {{ $song->release_date }}</p>
            <div class="mt-4 flex justify-center">
                <a href="{{ route('songs.index') }}" class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4 font-bold">Back</a>
            </div>
        </section>
    </main>
    <footer class="bg-[#1ed760] text-white p-4 text-center fixed bottom-0 w-full font-bold">
        &copy; 2024 Songs Website. All rights reserved.
    </footer>
</body>

</html>
