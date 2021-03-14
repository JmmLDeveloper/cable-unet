<x-page-layout page-title="Admin Panel">
    <x-sidebar active-tab="invoices" />
    <div class="w-full h-screen overflow-y-scroll overflow-x-hidden border-t flex flex-col px-12 py-8">
        <div class="flex items-center">
            <h1 class="text-4xl text-black"> Your Invoices</h1>
        </div>

        <div class="py-8 w-full">
            <x-data-table :column-names="['id','package_id','created_at']" :records="$invoices" />
        </div>
    </div>
</x-page-layout>