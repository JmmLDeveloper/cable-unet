<x-page-layout page-title="Admin Panel">
    <x-sidebar active-tab="packages" />

    <div class="w-full h-screen overflow-y-scroll overflow-x-hidden border-t flex flex-col px-12 py-8">
        <div class="flex items-baseline">
            <a href="{{ route('admin.package-list') }}">
                <i class=" rounded-full primary-color shadow-lg hover:shadow-xl  text-4xl fas fa-arrow-circle-left mr-3"></i>
            </a>
            <h1 class="text-4xl text-black"> Create a new Package</h1>
        </div>

        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
            <div class="leading-loose">
                <form class="p-6 bg-white rounded shadow-xl" action="store" method="POST">
                    @csrf
                    <div class="">
                        <label class="block text-md  text-gray-600" for="name-input"> Package Name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name-input" name="name" type="text" required="" placeholder="Package Name">
                    </div>
                    <div class="mt-2">
                        <label class="block text-md text-gray-600" for="price-input">Price</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="price-input" name="price" step="any" type="number" required="" placeholder=" Price for Package">
                    </div>
                    <div class="mt-2">
                        <label class="block text-md text-gray-600" for="internet-service-input">Internet Service</label>
                        <select class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="internet-service-input" name="internet_service">
                            <option value="nil" class="text-gray-500"> --- No Internet Service --- </option>
                            @foreach( $internet_services as $internet_service )
                            <option value="{{$internet_service->id}}"> {{$internet_service->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <label class="block text-md text-gray-600" for="telephone-service-input"> Telephone Service </label>
                        <select class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="telephone-service-input" name="telephone_service">
                            <option value="nil" class="text-gray-500"> --- No Telephone Service --- </option>
                            @foreach( $telephone_services as $telephone_service )

                            <option value="{{$telephone_service->id}}"> {{$telephone_service->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <label class="block text-md text-gray-600" for="television-service-input">Television Service</label>
                        <select class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="television-service-input" name="television_service">
                            <option value="nil" class="text-gray-500"> --- No Television Service --- </option>
                            @foreach( $television_services as $television_service )


                            <option value="{{$television_service->id}}"> {{$television_service->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
</x-page-layout>