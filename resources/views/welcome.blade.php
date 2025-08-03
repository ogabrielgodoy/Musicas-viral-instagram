<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white font-sans">
    <div class="max-w-6xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold text-white mb-1">Top 50 Músicas Virais Para o Instagram</h1>
        <p class="text-gray-400 mb-6">
            Atualizada semanalmente com as principais tendências do Instagram Reels.
        </p>

        <table class="w-full table-auto">
            <thead class="border-b border-gray-700 text-gray-400 text-sm">
                <tr>
                    <th class="py-2 px-4 text-left w-10">#</th>
                    <th class="py-2 px-4 text-left">Título</th>
                    <th class="py-2 px-4 hidden md:table-cell">Álbum</th>
                    <th class="py-2 px-4 text-right w-20">Duração</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tracks as $index => $track)
                <tr class="hover:bg-gray-800 text-sm border-b border-gray-800 cursor-pointer"
                    onclick="window.open('{{ $track['spotify'] }}', '_blank')">
                    <td class="py-3 px-4">{{ $index + 1 }}</td>
                    <td class="py-3 px-4 flex items-center gap-3">
                        <img src="{{ $track['image'] }}" alt="capa" class="w-10 h-10 rounded">
                        <div>
                            <p class="text-white font-medium">{{ $track['name'] }}</p>
                            <p class="text-gray-400 text-xs">{{ implode(', ', $track['artists']) }}</p>
                        </div>
                    </td>
                    <td class="py-3 px-4 hidden md:table-cell">{{ $track['album'] }}</td>
                    <td class="py-3 px-4 text-right text-gray-300">{{ $track['duration'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>