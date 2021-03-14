<x-page-layout page-title="Admin Panel">
    <x-sidebar active-tab="telephone-services" />


    <div class="w-full h-screen overflow-y-scroll overflow-x-hidden border-t flex flex-col px-12 py-8">
        <div class="flex items-center">
            <h1 class="text-4xl text-black"> List of telephone services</h1>
            <a
                href="{{ route('admin.telephone-service-create-form') }}"
                class="p-4 bg-white cta-btn font-semibold py-2 ml-6 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i>
                <span class="text-lg"> New </span>
            </a>
        </div>

        <div class="py-8 w-full">
            <x-data-table :column-names="['id','name','minutes']" :records="$telephone_services" />
        </div>
    </div>


</x-page-layout>