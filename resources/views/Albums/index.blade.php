<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen bg-black text-white">
    <header class="bg-[#1ed760] p-4 text-center">
        <h1 class="text-white font-bold text-xl">Albums</h1>
    </header>
    <main class="p-4 mt-16 flex-grow">
        <div class="mb-8 flex justify-between">
            <a href="{{ route('albums.create') }}"
                class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4"><b>Create New Album</b></a>
            <a href="{{ route('bands.index') }}"
                class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4"><b>Back to Bands</b></a>
        </div>
        <!-- Display success message -->
        @if(session('success'))
            <div class="bg-[#1ed760] text-white p-4 mb-4">{{ session('success') }}</div>
        @endif
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="bg-[#1ed760] px-4 py-2 text-left">Album Name</th>
                        <th class="bg-[#1ed760] px-4 py-2 text-left">Band</th>
                        <th class="bg-[#1ed760] px-4 py-2 text-left">Release Date</th>
                        <th class="bg-[#1ed760] px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($albums as $album)
                        <tr>
                            <td class="px-4 py-2">
                                <a href="{{ route('albums.show', $album->id) }}" class="hover:text-[#1ed760] font-bold">{{ $album->name }}</a>
                            </td>
                            <td class="px-4 py-2">{{ $album->band->name }}</td>
                            <td class="px-4 py-2">
                                @if ($album->year)
                                    {{ $album->year }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('albums.edit', $album->id) }}"
                                    class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4 font-bold">Edit</a>
                                <form action="{{ route('albums.destroy', $album->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn bg-red-500 hover:bg-red-700 rounded-lg py-2 px-4 font-bold"
                                        onclick="return confirm('Are you sure you want to delete this album?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <footer class="bg-[#1ED760] text-white p-4 text-center">
        &copy; 2024 Songs Website. All rights reserved.
    </footer>
</body>

</html>
