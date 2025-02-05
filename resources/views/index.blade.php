<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Incidentes MES</title>
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="max-w-full mx-auto mt-10 p-5 bg-white shadow-md rounded">
        <!-- Título -->
        <h1 class="text-3xl font-semibold text-center mb-5">Listado de Incidentes</h1>

        <!-- Mensaje de éxito (si se importa correctamente el archivo) -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-5">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario para importar el archivo Excel -->
        <form action="{{ route('incidentes.import') }}" method="POST" enctype="multipart/form-data" class="mb-4 p-6 border-2 border-gray-300 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700">Importar archivo Excel</label>
                <input type="file" name="file" id="file" accept=".xlsx, .xls" class="mt-2 p-2 border rounded w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Subir Excel</button>
        </form>

        <form action="" method="GET" class="mb-4 p-6 border-2 border-gray-300 rounded-lg shadow-lg">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <label for="date" class="block font-medium text-gray-700">Fecha</label>
                    <input type="date" name="date" id="date" class="form-input mt-1 block w-full" value="{{ request('date') == '' }}">
                </div>
                <div>
                    <label for="job" class="block font-medium text-gray-700">Job</label>
                    <select name="job" id="job" class="form-select mt-1 block w-full">
                        <option value="">Seleccione un Job</option>
                        @foreach ($jobs as $job)
                            <option value="{{ $job }}" {{ request('job') == $job ? 'selected' : '' }}>
                                {{ $job }}
                            </option>
                        @endforeach
                    </select>
                </div>             
                <div>
                    <label for="line" class="block font-medium text-gray-700">Line</label>
                    <select name="line" id="line" class="form-select mt-1 block w-full">
                        <option value="">Seleccione un Job</option>
                        @foreach ($lines as $line)
                            <option value="{{ $line }}" {{ request('job') == $line ? 'selected' : '' }}>
                                {{ $line }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="pt-6">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700 transition duration-300">Filtrar</button>
            </div>
        </form>
        
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b text-center">Fecha</th>
                    <th class="px-4 py-2 border-b text-center">Incidente</th>
                    <th class="px-4 py-2 border-b text-center">Evidencia</th>
                    <th class="px-4 py-2 border-b text-center">Job</th>
                    <th class="px-4 py-2 border-b text-center">Line</th>
                    <th class="px-4 py-2 border-b text-center">Persons Who Attended</th>
                    <th class="px-4 py-2 border-b text-center">Total Invested Time *min*</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incidentes as $incidente)
                    <tr class="content-center">
                        <td class="px-4 py-2 border-b text-center">{{ \Carbon\Carbon::parse($incidente->date)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $incidente->issue }}</td>
                        <td class="px-4 py-2 border-b text-center">
                            @if ($incidente->evidence)
                                <img src="{{ asset('storage/' . $incidente->evidence) }}" alt="Evidencia" class="h-16">
                            @else
                                No hay evidencia
                            @endif
                        </td>
                        <td class="px-4 py-2 border-b text-center">{{ $incidente->job }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $incidente->line }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $incidente->persons_attended }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $incidente->total_invested_time }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>