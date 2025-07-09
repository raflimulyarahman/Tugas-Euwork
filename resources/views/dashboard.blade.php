<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-000 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card bg-primary-subtle">
                                    <div class="card-header">
                                        Jumlah Produk
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title fw-bold">150</h1>
                                        <p class="card-text">Total produk yang tersedia di <br> sistem.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-success-subtle">
                                    <div class="card-header">
                                        Jumlah Klik Produk
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title fw-bold">12.500</h1>
                                        <p class="card-text">Total klik pada produk yang telah dilihat pengguna.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-warning-subtle">
                                    <div class="card-header">
                                        Jumlah Kategori Produk
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title fw-bold">10</h1>
                                        <p class="card-text">Total kategori produk yang tersedia di sistem.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>