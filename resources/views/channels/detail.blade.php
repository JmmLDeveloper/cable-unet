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
            <h2 class="text-3xl mb-4"> Programming </h2>
            <ul>
                <li class=" mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow" >
                    <a class="w-full h-full block p-4"  href="{{ route('programming-detail',['channel' => $channel->id,'day'=> 'sunday']) }}">
                        <h3>
                            Sunday
                        </h3>
                    </a>
                </li>
                <li class=" mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow" >
                    <a class="w-full h-full block p-4"  href="{{ route('programming-detail',['channel' => $channel->id,'day'=> 'monday']) }}">
                        <h3>
                            Monday
                        </h3>
                    </a>
                </li>
                <li class=" mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow" >
                    <a class="w-full h-full block p-4"  href="{{ route('programming-detail',['channel' => $channel->id,'day'=> 'tuesday']) }}">
                        <h3>
                            Tuesday
                        </h3>
                    </a>
                </li>
                <li class=" mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow" >
                    <a class="w-full h-full block p-4"  href="{{ route('programming-detail',['channel' => $channel->id,'day'=> 'wednesday']) }}">
                        <h3>
                            Wednesday
                        </h3>
                    </a>
                </li>
                <li class=" mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow" >
                    <a class="w-full h-full block p-4"  href="{{ route('programming-detail',['channel' => $channel->id,'day'=> 'thrusday']) }}">
                        <h3>
                            Thursday
                        </h3>
                    </a>
                </li>
                <li class=" mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow" >
                    <a class="w-full h-full block p-4"  href="{{ route('programming-detail',['channel' => $channel->id,'day'=> 'friday']) }}">
                        <h3>
                            Friday
                        </h3>
                    </a>
                </li>
                <li class=" mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow" >
                    <a class="w-full h-full block p-4"  href="{{ route('programming-detail',['channel' => $channel->id,'day'=> 'saturday']) }}">
                        <h3>
                            Saturday
                        </h3>
                    </a>
                </li>

            </ul>

        </div>
    </div>


</x-page-layout>