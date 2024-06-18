<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $band->name }} - Band Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white">
    <header class="bg-[#1ed760] p-4 text-center">
        <h1 class="text-white font-bold text-xl">Band Details - {{ $band->name }}</h1>
    </header>
    <main class="p-4 mt-16">
        <section class="p-4 border border-gray-500">
            <p><strong>ID:</strong> {{ $band->id }}</p>
            <p><strong>Band name:</strong> {{ $band->name }}</p>
            <p><strong>Genre:</strong> {{ $band->genre }}</p>
            <p><strong>Founded:</strong> {{ $band->founded }}</p>
            <p><strong>Active Till:</strong> {{ $band->active_till }}</p>
            <p><strong>Albums:</strong>
                @if ($band->albums->isEmpty())
                    None
                @else
                    <p class="list-disc pl-5">
                        @foreach ($band->albums as $album)
                            <li>
                                <strong>{{ $album->name }}</strong> ({{ $album->year }})  
                            </li>
                        @endforeach
                    </p>
                @endif
            </p>
            <p><strong>Updated at:</strong> {{ $band->updated_at }}</p>
            <p><strong>Created at:</strong> {{ $band->created_at }}</p>
            <div class="mt-4 flex justify-center">
                <a href="{{ route('bands.index') }}" class="btn bg-[#1ed760] hover:bg-[#14833b] rounded-lg py-2 px-4 font-bold">Back</a>
            </div>
        </section>
    </main>
    <footer class="bg-[#1ed760] text-white p-4 text-center fixed bottom-0 w-full font-bold">
        &copy; 2024 Songs Website. All rights reserved.
    </footer>
</body>

</html>
