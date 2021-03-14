<div class="shadow overflow-hidden rounded border-b border-gray-200">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                @foreach( $columnNames as $column_name )
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">{{$column_name}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach( $records as $record )
            <tr>
                @foreach( $columnNames as $column_name )
                <td class="text-left py-3 px-4">{{ $record[$column_name] }} </td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>