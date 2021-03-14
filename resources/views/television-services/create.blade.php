<x-page-layout page-title="Admin Panel">
    <x-sidebar active-tab="television-services" />

    <div class="w-full h-screen overflow-y-scroll overflow-x-hidden border-t flex flex-col px-12 py-8">
        <div class="flex items-baseline">
            <a href="{{ route('admin.television-service-list') }}">
                <i class=" rounded-full primary-color shadow-lg hover:shadow-xl  text-4xl fas fa-arrow-circle-left mr-3"></i>
            </a>
            <h1 class="text-4xl text-black"> Create a new television service</h1>
        </div>

        <div class="w-full lg:w-10/12 my-6 pr-0 lg:pr-2">
            <div class="leading-loose">
                <form class="p-6 bg-white rounded shadow-xl" action="store" method="POST">
                    @csrf
                    <div class="">
                        <label class="block text-lg  text-gray-600" for="name-input"> Service Name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name-input" name="name" type="text" required="" placeholder="Internet Service Name">
                    </div>
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="tier-input">Tier</label>
                        <select class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="tier-input" name="tier">
                            <option value="1">Diamond </option>
                            <option value="2" selected>Platinium</option>
                            <option value="3">Gold</option>
                            <option value="4" selected>Silver</option>
                            <option value="5">bronze</option>
                        </select>
                    </div>
                    <div class="mt-2">
                        <p class="block text-xl text-gray-600"> Channels </p>
                        <ul class="flex justify-between flex-wrap">
                            @foreach( $channels as $channel )
                            <li class=" flex justify-between items-center content-end w-full md:w-1/2 w lg:w-1/3">
                                <label for="channel-id-{{ $channel->id  }}-input"> {{$channel->name}} </label>
                                <input class="mr-4" type="checkbox" name="channel-id-{{ $channel->id  }}" id="channel-id-{{ $channel->id  }}-input">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
</x-page-layout>