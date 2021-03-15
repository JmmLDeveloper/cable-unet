<x-page-layout page-title="{{ Auth::user()->is_admin ? 'Admin Panel'  :'Subscriber Panel'}}">
    <x-sidebar active-tab="programmings" />


    <div class="w-full h-screen overflow-y-scroll overflow-x-hidden border-t px-12 py-8">
        <div class="flex items-center">
            <h1 class="text-4xl text-black"> Programming for {{ $day }}</h1>
        </div>

        <div class="shadow overflow-x-scroll overflow-y-hidden  mt-4 rounded border-b border-gray-200">
            <table class="w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr class="w-1/3">
                        <th class="w-64 text-left py-3 px-4 uppercase font-semibold text-sm"> Channel </th>
                        @foreach( range(0,47) as $time_unit )
                        <x-hour-time-th :time-unit="$time_unit" />
                        @endforeach
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach( $channels as $channel )
                    <tr>
                        @php
                            $programmings = $channel->getProgrammingsByDay($day);
                        @endphp
                        <td class="text-left py-3 px-4"> {{ $channel->name }} </td>
                        <x-programming-table-filler-td direction="left" :programming="$programmings->first()" />
                        @foreach( $programmings as $programming )
                            <x-show-programming-td :programming="$programming" />
                        @endforeach
                        <x-programming-table-filler-td direction="right" :programming="$programmings->last()" />
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-page-layout>