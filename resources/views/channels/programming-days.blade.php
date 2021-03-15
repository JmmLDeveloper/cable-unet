<x-page-layout page-title="{{ Auth::user()->is_admin ? 'Admin Panel'  :'Subscriber Panel'}}">
    <x-sidebar active-tab="programmings" />
    <div class="w-full h-screen overflow-y-scroll overflow-x-hidden border-t flex flex-col px-12 py-8">
        <div class="flex items-center">
            <h1 class="text-4xl text-black"> Programming for days</h1>

        </div>
        <div>
            <p class="text-3xl my-4"> Select a day </p>
            <ul>
                <li class=" mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow">
                    <a class="w-full h-full block p-4" href="{{route('programming-table',['day'=>'sunday'])}}">
                        <h3>
                            Sunday
                        </h3>
                    </a>
                </li>
                <li class=" mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow">
                    <a class="w-full h-full block p-4" href="{{route('programming-table',['day'=>'monday'])}}">
                        <h3>
                            Monday
                        </h3>
                    </a>
                </li>
                <li class=" mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow">
                    <a class="w-full h-full block p-4" href="{{route('programming-table',['day'=>'tuesday'])}}">
                        <h3>
                            Tuesday
                        </h3>
                    </a>
                </li>
                <li class=" mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow">
                    <a class="w-full h-full block p-4" href="{{route('programming-table',['day'=>'wednesday'])}}">
                        <h3>
                            Wednesday
                        </h3>
                    </a>
                </li>
                <li class=" mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow">
                    <a class="w-full h-full block p-4" href="{{route('programming-table',['day'=>'thrusday'])}}">
                        <h3>
                            Thursday
                        </h3>
                    </a>
                </li>
                <li class=" mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow">
                    <a class="w-full h-full block p-4" href="{{route('programming-table',['day'=>'friday'])}}">
                        <h3>
                            Friday
                        </h3>
                    </a>
                </li>
                <li class=" mb-4 cursor-pointer  transition duration-300 ease-out hover-lift-effect rounded bg-white shadow">
                    <a class="w-full h-full block p-4" href="{{route('programming-table',['day'=>'saturday'])}}">
                        <h3>
                            Saturday
                        </h3>
                    </a>
                </li>

            </ul>

        </div>
    </div>
</x-page-layout>