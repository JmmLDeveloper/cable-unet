<x-page-layout page-title="{{ Auth::user()->is_admin ? 'Admin Panel'  :'Subscriber Panel'}}">
    <x-sidebar active-tab="channels" :admin-sidebar="false" />

    <div class="w-full   h-screen overflow-x-hidden overflow-y-scroll border-t flex flex-col px-12 py-8">
    <div class="flex items-center mb-8">
            <h1 class="text-4xl text-black"> Television Channels</h1>
        </div>
        @foreach( $channels as $channel )
      <a href="{{$channel->url}}" class="p-4 mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow">
            <h2>
                {{$channel->name}}
            </h2>
        </a>
        @endforeach
    </div>


</x-page-layout>