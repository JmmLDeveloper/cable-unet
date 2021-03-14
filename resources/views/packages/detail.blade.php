<x-page-layout page-title="Subscriber Panel">
    <x-sidebar active-tab="packages" />

    <div class="w-full relative h-screen overflow-x-hidden overflow-y-scroll border-t flex flex-col px-12 py-4">
        <a class="absolute top-0 mt-6 ml-6 left-0" href="{{ route('subscriber.package-list') }}">
            <i class=" rounded-full primary-color shadow-lg hover:shadow-xl  text-4xl fas fa-arrow-circle-left mr-3"></i>
        </a>
        <div>
            <div class="flex justify-center flex-col items-center mb-8">
                <span class="primary-color text-xl mb-2">package</span>
                <h1 class="text-6xl detail-title text-black">
                    {{$package->name}}
                </h1>
                <form class="flex justify-center" method="POST" action="{{ route('subscriber.request-package-change',[ 'package' => $package->id ]) }}">
                    @csrf
                    <button class="mt-2 p-4 bg-white cta-btn font-semibold py-2 ml-6 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center text-2xl" type="submit">
                        Request this package for $ {{ $package->price }} a month
                    </button>
                </form>
            </div>
        </div>
        <div>
            @if( $package->internetService )
            <div class="bg-white p-4 rounded-lg mb-4">
                <h3 class="text-2xl"> Internet </h3>
                <h4 class="primary-color text-xl "> {{$package->internetService->name}} </h4>
                <p> Internet with a provided bandwith of {{ $package->internetService->bandwidth  }} </p>
            </div>
            @endif
            @if( $package->telephoneService )
            <div class="bg-white p-4 rounded-lg mb-4">
                <h3 class="text-2xl"> Telephone </h3>

                <h4 class="primary-color text-xl "> {{$package->telephoneService->name}} </h4>
                <p> Enjoy internationals call with this package {{ $package->telephoneService->minutes  }} minutes </p>
            </div>
            @endif
            @if( $package->televisionService )
            <div class="bg-white p-4 rounded-lg mb-4">
                <h3 class="text-2xl"> Television </h3>

                <h4 class="primary-color text-xl "> {{$package->televisionService->name}} </h4>
                <p> Watch your favorites shows with {{$package->televisionService->tier}} television </p>
                <h6 class="primary-color text-lg"> List of Channels </h6>
                <ul>
                    @foreach( $package->televisionService->channels as $channel )
                    <li class="ml-2"> * {{ $channel->name }} </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>


</x-page-layout>