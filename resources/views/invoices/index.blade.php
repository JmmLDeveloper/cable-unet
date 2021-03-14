<x-page-layout page-title="Admin Panel">
    <x-sidebar active-tab="invoices" />
    <div class="w-full h-screen overflow-y-scroll overflow-x-hidden border-t flex flex-col px-12 py-8">
        <div class="flex items-center">
            <h1 class="text-4xl text-black"> List of User Invoices</h1>
            <form action="{{route('admin.invoices-close-month')}}" method="POST">
                @csrf
                <button type="submit" class="p-4 bg-white cta-btn font-semibold py-2 ml-6 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-plus mr-3"></i>
                    <span class="text-lg">
                        <span> Close Month </span>
                        <span class="text-xs"> ( issue invoices for all users ) </span>
                    </span>
                </button>
            </form>
        </div>

        <div class="py-8 w-full">
            <x-data-table :column-names="['id','user_id','charge','package_id','created_at']" :records="$invoices" />
        </div>
    </div>
</x-page-layout>