<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Incidente</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Evidencia</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Job</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Line</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Persons Who Attended</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Invested Time (min)</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($incidentes as $incidente)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($incidente->date)->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-normal break-words">{{ $incidente->issue }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($incidente->evidence)
                            <img src="{{ asset('images/' . $incidente->evidence) }}" alt="Evidencia" class="w-16 h-16 object-cover cursor-pointer" onclick="openImageModal('{{ asset('images/' . $incidente->evidence) }}')">
                        @else
                            No image
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-normal break-words">{{ $incidente->job }}</td>
                    <td class="px-6 py-4 whitespace-normal break-words">{{ $incidente->line }}</td>
                    <td class="px-6 py-4 whitespace-normal break-words">{{ $incidente->persons_attended }}</td>
                    <td class="px-6 py-4 whitespace-normal break-words">{{ $incidente->total_invested_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>