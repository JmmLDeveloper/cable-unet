    <aside class="relative bg-sidebar h-screen w-72 hidden sm:block shadow-xl">
        <div class="p-4 pb-0 flex  flex-col items-center justify-center align-center">
            <a href="{{route('admin-home') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin Panel</a>
            <span  class="text-sm mt-4 text-white font-semibold uppercase"> {{ auth()->user()->name }} </span>
        </div>
        <nav class="text-white text-base font-semibold pt-3">

            @if( $adminSidebar )
            <a href="{{route('admin-home') }}" class="{{ $tabStyle('home') }}">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="{{ route('admin.internet-service-list') }}" class="{{ $tabStyle('internet-services') }}">
                <i class="fas fa-globe mr-3"></i>
                Internet Services
            </a>
            <a href="{{ route('admin.telephone-service-list') }}" class="{{ $tabStyle('telephone-services') }}">
                <i class="fas fa-phone mr-3"></i>
                Telephone Services
            </a>
            <a href="{{ route('admin.television-service-list') }}" class="{{ $tabStyle('television-services') }}">
                <i class="fas fa-tv mr-3"></i>
                Television Services
            </a>
            <a href="{{ route('admin.package-list') }}" class="{{ $tabStyle('packages') }}">
                <i class="fas fa-box mr-3"></i>
                Customer Packages
            </a>
            <a href="{{ route('admin.package-change-requests') }}" class="{{ $tabStyle('package-change-request') }}">
                <i class="fas fa-exchange-alt mr-3"></i>
                Package Change Requests
            </a>
            <a href="{{ route('admin.user-list') }}" class="{{ $tabStyle('user-management') }}">
                <i class="fas fa-user mr-3"></i>
                User Management
            </a>
            <a href="{{ route('admin.invoice-list') }}" class="{{ $tabStyle('invoices') }}">
                <i class="fas fa-file-invoice-dollar mr-3"></i>
                Invoices
            </a>
            @else
            <a href="{{route('subscriber.home') }}" class="{{ $tabStyle('home') }}">
                <i class="fas fa-home mr-3"></i>
                Home
            </a>
            <a href="{{ route('subscriber.package-list') }}" class="{{ $tabStyle('packages') }}">
                <i class="fas fa-box mr-3"></i>
                Available Packages
            </a>
            <a href="{{ route('subscriber.invoice-list') }}" class="{{ $tabStyle('invoices') }}">
                <i class="fas fa-file-invoice-dollar mr-3"></i>
                Invoices
            </a>
            @endif
            <a href="{{ route('channel-list') }}" class="{{ $tabStyle('channels') }}">
                <i class="fas fa-th mr-3"></i>
                Channels
            </a>
            <form method="POST" action="{{ route('logout') }}" >
                @csrf
                <button class="w-full h-full {{ $tabStyle('logout') }}" >
                    <i  class="fas fa-sign-out-alt mr-3"></i>
                    Logout
                </button>
            </form>
        </nav>
    </aside>