<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white">
    <header class="bg-[#1ed760] p-4 text-center">
        <h1 class="text-white font-bold text-xl">Songs</h1>
    </header>
    <main class="p-4 mt-16 pb-20">
        <div class="mb-8">
            <a href="{{ route('songs.create') }}" class="btn bg-[#1ed760] hover:bg-[#1ed760] rounded-lg py-2 px-4"><b>Create New Song</b></a>
        </div>
        <!-- Display success message -->
        @if(session('success'))
            <div class="bg-[#1ed760] text-white p-4 mb-4">{{ session('success') }}</div>
        @endif
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="bg-[#1ed760] px-4 py-2 text-left">Song Name</th>
                        <th class="bg-[#1ed760] px-4 py-2 text-left">Artist</th>
                        <th class="bg-[#1ed760] px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($songs as $song)
                        <tr>
                            <td class="px-4 py-2"><a href="{{ route('songs.show', $song->id) }}" class="hover:text-[#1ed760] font-bold">{{ $song->title }}</a></td>
                            <td class="px-4 py-2">{{ $song->singer }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('songs.edit', $song->id) }}" class="btn bg-[#1ed760] hover:bg-[#1ed760] rounded-lg py-2 px-4 font-bold">Edit</a>
                                <form action="{{ route('songs.destroy', $song->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn bg-red-500 hover:bg-red-700 rounded-lg py-2 px-4 font-bold" onclick="return confirm('Are you sure you want to delete this song?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <footer class="bg-[#1ED760] text-white p-4 text-center w-full font-bold">
        &copy; 2024 Songs Website. All rights reserved.
    </footer>

    <style>
        @media screen and (max-width: 450px) {
            /* Voeg hier je aanpassingen toe voor schermen kleiner dan 451px */
            .btn {
                display: block;
                margin-bottom: 10px;
            }
        }
    </style>
</body>
</html>
