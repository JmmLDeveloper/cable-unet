<x-page-layout page-title="Subscriber Panel">
    <x-sidebar active-tab="home" :admin-sidebar="false" />


    <div class="w-full relative h-screen overflow-x-hidden overflow-y-scroll border-t flex flex-col px-12 py-4">
        <div class="flex justify-center opacity-75 mb-8 mt-4  bg-gray-300 rounded-lg p-4 ">
            <h1 class="text-center text-3xl">
                Hello <span class="primary-color"> {{ $user->name }} </span> ,we hope you are having a great day!
            </h1>
        </div>
        @if( $user->package )
        <div>
            <section>
                <header class="flex flex-col mb-2">
                    <span class="text-4xl mb-2">Your current package</span>
                    <h2 class="text-3xl primary-color detail-title text-black">
                        {{$user->package->name}}
                    </h2>
                </header>
                <main>
                    @if( $user->package->internetService )
                    <div class="bg-white p-4 rounded-lg mb-4">
                        <h3 class="text-2xl"> Internet </h3>
                        <h4 class="primary-color text-xl "> {{$user->package->internetService->name}} </h4>
                        <p> Internet with a provided bandwith of {{ $user->package->internetService->bandwidth  }} </p>
                    </div>
                    @endif
                    @if( $user->package->telephoneService )
                    <div class="bg-white p-4 rounded-lg mb-4">
                        <h3 class="text-2xl"> Telephone </h3>

                        <h4 class="primary-color text-xl "> {{$user->package->telephoneService->name}} </h4>
                        <p> Enjoy internationals call with this package {{ $user->package->telephoneService->minutes  }} minutes </p>
                    </div>
                    @endif
                    @if( $user->package->televisionService )
                    <div class="bg-white p-4 rounded-lg mb-4">
                        <h3 class="text-2xl"> Television </h3>

                        <h4 class="primary-color text-xl "> {{$user->package->televisionService->name}} </h4>
                        <p> Watch your favorites shows with {{$user->package->televisionService->tier}} television </p>
                        <h6 class="primary-color text-lg"> List of Channels </h6>
                        <ul>
                            @foreach( $user->package->televisionService->channels as $channel )
                            <li class="ml-2"> * {{ $channel->name }} </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </main>
            </section>
            <section>
                <header class="flex flex-col mb-2">
                    <span class="text-4xl mb-2">Invoice of the month</span>
                    <p class="text-xl detail-title text-black">
                        You will be paying
                        <span class="text-green-600"> ${{ $user->package->price }} </span>
                        at the end of the month for package
                        <span class="primary-color"> {{ $user->package->name }} </span>
                    </p>
                </header>
            </section>
        </div>

        @else
        <div class="flex justify-center items-center">
            <p class="text-center w-full md:w-10/12 lg: w-2/3 text-4xl">
                It seems that you dont have not acquired any package,
                you can see what <a href=""> packages </a> are availabes
                and search for <a href="">channels</a> and
                <a href=""> shows </a> ,
                to help you select your ideal package
            </p>
        </div>
        @endif
    </div>


</x-page-layout>