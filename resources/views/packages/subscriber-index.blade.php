<x-page-layout page-title="Subscriber Panel">
    <x-sidebar active-tab="packages" :admin-sidebar="false" />

    <div class="w-full   h-screen overflow-x-hidden overflow-y-scroll border-t flex flex-col px-12 py-8">
    <div class="flex items-center mb-8">
            <h1 class="text-4xl text-black"> Packages Available</h1>
        </div>
        @foreach( $packages as $package )
        <a href="{{$package->url}}" class="p-4 mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow">
            <h2>
                {{$package->name}}
            </h2>
            <div>
                $ {{$package->price}}
            </div>
            <div>
                {{$package->internet}}

            </div>
            <div>
                {{$package->telephone}}

            </div>
            <div>
                {{$package->television}}
            </div>
        </a>
        @endforeach
    </div>


</x-page-layout>