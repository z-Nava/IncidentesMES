<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Fecha</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Incidente</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Evidencia</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Job</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Line</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Persons Who Attended</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Total Invested Time (min)</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($incidentes as $incidente)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ \Carbon\Carbon::parse($incidente->date)->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-normal text-center">{{ $incidente->issue }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($incidente->evidence)
                            @foreach(json_decode($incidente->evidence) as $image)
                                <img src="{{ asset('images/' . $image) }}" alt="Evidencia" class="w-16 h-16 object-cover cursor-pointer" onclick="openImageModal('{{ asset('images/' . $image) }}')">
                            @endforeach
                        @else
                            No image
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-normal break-words text-center">{{ $incidente->job }}</td>
                    <td class="px-6 py-4 whitespace-normal break-words text-center">{{ $incidente->line }}</td>
                    <td class="px-6 py-4 whitespace-normal break-words text-center">{{ $incidente->persons_attended }}</td>
                    <td class="px-6 py-4 whitespace-normal break-words text-center">{{ $incidente->total_invested_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>