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
            </div>
        </div>
        <div>
            <form method="POST"  action="{{ route('subscriber.request-package-change',[ 'package' => $package->id ]) }}" >
                @csrf
                Request Plan For $ {{ $package->price }}
                <button type="submit"> Change! </button>
            </form>
            @if( $package->internetService )
            <div>
                <h3> Internet Service </h3>
                <ul>
                    <li> <strong> Name </strong> <span> {{ $package->internetService->name }} </span> </li>
                    <li> <strong> Bandwidth </strong> <span> {{ $package->internetService->bandwidth }} </span> </li>
                </ul>
            </div>
            @endif
            @if( $package->telephoneService )
            <div>
                <h3> telephone Service </h3>
                <ul>
                    <li> <strong> Name </strong> <span> {{ $package->telephoneService->name }} </span> </li>
                    <li> <strong> Minutes </strong> <span> {{ $package->telephoneService->minutes }} </span> </li>
                </ul>
            </div>
            @endif
            @if( $package->televisionService )
            <div>
                <h3> Televisions Service </h3>
                <ul>
                    <li> <strong> Name </strong> <span> {{ $package->televisionService->name }} </span> </li>
                    <li> <strong> Tier </strong> <span> {{ $package->televisionService->tier }} </span> </li>
                </ul>
            </div>
            @endif

        </div>
    </div>


</x-page-layout>