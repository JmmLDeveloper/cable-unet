<x-page-layout page-title="Subscriber Panel">
    <x-sidebar active-tab="home" :admin-sidebar="false" />


    <div class="w-full relative h-screen overflow-x-hidden overflow-y-scroll border-t flex flex-col px-12 py-4" >
        <div  class="flex justify-center">
            <h1 class="text-center text-3xl c">
                Hello  <span class="primary-color"> {{ $user->name }} </span>  hope you are having a great day!
            </h1>
        </div>
        @if( $user->package )
        <div>
            <header class="flex flex-col mb-8">
                <span class="text-5xl mb-2">Your current package</span>
                <h1 class="text-3xl primary-color detail-title text-black">
                    {{$user->package->name}}
                </h1>
            </header>
            <main>
                @if( $user->package->internetService )
                <div>
                    <h4> {{$user->package->internetService->name}} </h4>
                    <p> Internet with a provided bandwith of {{ $user->package->internetService->bandwidth  }} </p>
                </div>
                @endif
                @if( $user->package->telephoneService )
                <div>
                    <h4> {{$user->package->telephoneService->name}} </h4>
                    <p> Enjoy internationals call with this package {{ $user->package->telephoneService->minutes  }} minutes </p>
                </div>
                @endif
                @if( $user->package->televisionService )
                <div>
                    <h4> {{$user->package->televisionService->name}} </h4>
                    <p> Watch your favorites shows with {{$user->package->televisionService->tier}} television </p>
                    <h6> List of Channels </h6>
                    <ul>
                        @foreach( $user->package->televisionService->channels as $channel  )
                            <li> {{ $channel->show_name }} </li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </main>
        </div>

        @else
        <p>
            It seems that you dont have not acquired any package,
            you can see what <a href=""> packages </a> are availabes
            and search for <a href="">channels</a> and
            <a href=""> shows </a> ,
            to help you select your ideal package
        </p>
        @endif
    </div>


</x-page-layout>