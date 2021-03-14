<x-page-layout page-title="Admin Panel">
    <x-sidebar active-tab="user-management" />

    <div class="w-full h-screen overflow-y-scroll overflow-x-hidden border-t flex flex-col px-12 py-8">
        <div class="flex items-baseline">
            <a href="{{ route('admin.user-list') }}">
                <i class=" rounded-full primary-color shadow-lg hover:shadow-xl  text-4xl fas fa-arrow-circle-left mr-3"></i>
            </a>
            <h1 class="text-4xl text-black"> Register a new User</h1>
        </div>

        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
            <div class="leading-loose">
                <form class="p-6 bg-white rounded shadow-xl" action="store" method="POST" >
                    @csrf
                    <div class="">
                        <label class="block text-md  text-gray-600" for="name-input"> Name </label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name-input" name="name" type="text" required="" placeholder="user name">
                    </div>
                    <div class="mt-2">
                        <label class="block text-md text-gray-600" for="email-input"> Email </label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="email-input" name="email" type="email" required="" placeholder=" user email ">
                    </div>
                    <div class="mt-2 ">
                        <label class="block text-md text-gray-600" for="password-input"> Password </label>
                        <input class="w-full px-5 ml-2 py-1 text-gray-700 bg-gray-200 rounded" id="password-input" name="password" type="password" required="">
                    </div>
                    <div class="mt-2 ">
                        <label class="block text-md text-gray-600" for="password-confirmation-input"> Password Confirmation </label>
                        <input class="w-full px-5 ml-2 py-1 text-gray-700 bg-gray-200 rounded" id="password-confirmation-input" name="password_confirmation" type="password" required="">
                    </div>
                    <div class="mt-2 flex justify-start items-center">
                        <label class="block text-md text-gray-600" for="is-admin-input"> Admin </label>
                        <input class="px-5 ml-2 py-1 text-gray-700 bg-gray-200 rounded" id="is-admin-input" name="is_admin" value="true" type="checkbox" >
                    </div>
                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Create</button>
                    </div>
                    
                </form>
            </div>
        </div>
</x-page-layout>