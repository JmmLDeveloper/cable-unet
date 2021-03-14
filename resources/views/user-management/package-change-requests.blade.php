<x-page-layout page-title="Subscriber Panel">
    <x-sidebar active-tab="package-change-request" />


    <div class="w-full h-screen overflow-y-scroll overflow-x-hidden border-t flex flex-col px-12 py-8">
        <div class="flex items-center">
            <h1 class="text-4xl text-black">Package Change User Requests</h1>
        </div>

        <div class="py-8 w-full">
            <div class="shadow overflow-hidden rounded border-b border-gray-200">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center"> Id </th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center"> User Id </th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center"> User Email </th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center"> Package Id</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center"> Package Name </th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center"> Package Price </th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center"></th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach( $change_requests as $change_request )
                        <tr>
                        <td class="text-left py-3 px-4 text-center">{{ $change_request->id }} </td>
                            <td class="text-left py-3 px-4 text-center">{{ $change_request->user->id }} </td>
                            <td class="text-left py-3 px-4 text-center">{{ $change_request->user->email }} </td>
                            <td class="text-left py-3 px-4 text-center">{{ $change_request->package->id }} </td>
                            <td class="text-left py-3 px-4 text-center">{{ $change_request->package->name }} </td>
                            <td class="text-left py-3 px-4 text-center">{{ $change_request->package->price }} </td>
                            <td class="text-left py-3 px-4 text-center  ">
                                <div class="flex">
                                    <div class="rounded-xl w-12 h-12 bg-gray-200 justify-center items-center ">
                                        <form class="w-full h-full" action="{{ route('admin.respond-request',['package_change_request' => $change_request->id]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="answer" value="accept">
                                            <button class="w-full h-full text-3xl" type="submit">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="rounded-xl w-12 h-12 ml-4 flex justify-center items-center  bg-gray-200">
                                        <form class="w-full h-full" action="{{ route('admin.respond-request',['package_change_request' => $change_request->id]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="answer" value="reject">
                                            <button class="w-full h-full text-3xl" type="submit">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>





</x-page-layout>