<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Band List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white flex flex-col min-h-screen">
    <header class="bg-[#1ed760] p-4 text-center">
        <h1 class="text-white font-bold text-xl">Bands</h1>
    </header>
    <main class="p-4 flex-grow">
        <div class="mb-8 flex justify-between">
            <a href="{{ route('bands.create') }}" class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4"><b>Create New Band</b></a>
            <a href="{{ route('songs.index') }}" class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4"><b>Back to Songs</b></a>
            <a href="{{ route('albums.index') }}" class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4"><b>Show All Albums</b></a>
        </div>
        <!-- Display success message -->
        @if(session('success'))
            <div class="bg-[#1ed760] text-white p-4 mb-4">{{ session('success') }}</div>
        @endif
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="bg-[#1ed760] px-4 py-2 text-left">Band Name</th>
                        <th class="bg-[#1ed760] px-4 py-2 text-left">Genre</th>
                        <th class="bg-[#1ed760] px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bands as $band)
                        <tr>
                            <td class="px-4 py-2"><a href="{{ route('bands.show', $band->id) }}" class="hover:text-[#1ed760] font-bold">{{ $band->name }}</a></td>
                            <td class="px-4 py-2">{{ $band->genre }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('bands.edit', $band->id) }}" class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4 font-bold">Edit</a>
                                <form action="{{ route('bands.destroy', $band->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn bg-red-500 hover:bg-red-700 rounded-lg py-2 px-4 font-bold" onclick="return confirm('Are you sure you want to delete this band?');">Delete</button>
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
            .btn {
                display: block;
                margin-bottom: 10px;
            }
        }
    </style>
</body>
</html>
