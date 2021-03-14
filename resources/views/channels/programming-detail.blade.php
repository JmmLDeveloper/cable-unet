<x-page-layout page-title="{{ Auth::user()->is_admin ? 'Admin Panel'  :'Subscriber Panel'}}">
    <x-sidebar active-tab="channels" />

    <div class="w-full relative h-screen overflow-x-hidden overflow-y-scroll border-t flex flex-col px-12 py-4">
        <a class="absolute top-0 mt-6 ml-6 left-0" href="{{ route('channel-list') }}">
            <i class=" rounded-full primary-color shadow-lg hover:shadow-xl  text-4xl fas fa-arrow-circle-left mr-3"></i>
        </a>
        <div>
            <div class="flex justify-center flex-col items-center mb-8">
                <span class="primary-color text-xl mb-2">channel</span>
                <h1 class="text-6xl detail-title text-black">
                    {{$channel->name}}
                </h1>
            </div>
        </div>
        <div>
            <h2 class="text-3xl mb-4"> Programming  > {{ $day }}</h2>

        </div>
    </div>


</x-page-layout>