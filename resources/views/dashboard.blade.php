<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <div>
                        <p class="mb-2">Status</p>
                        <p class="text-error" id="text-status"></p>
                    </div>
                    <div class="sm:flex sm:justify-center">
                        @foreach ($schedules as $schedule)
                        <div class="mx-4">
                            <p class="mt-2">{{ 'Jam '.$schedule->name }}</p>
                            <button class="btn btn-outline btn-sm w-20 mt-1">{{ substr($schedule->time, 0, 5) }}</button>
                        </div>
                        @endforeach
                        <div class="mx-4">
                            <p class="mt-2">On/Off Sistem</p>
                            {{-- 1. ketika btn-system di click maka akan memanggil function updateDataSystem(). --}}
                            <button class="btn btn-sm w-20 mt-1" id="btn-system" onClick="updateDataSystem()"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>

            // ketika browser pertama kali selesai dimuat, akan setup header ajax dan memanggil getDataSystem().
            // gunanya untuk menentukan nilai awal system (ON/OFF).
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                getDataStatus();
                getDataSystem();
            });

            const getDataStatus = () => {
                $.get('/api/schedule/done').done(data => { // ajax hit endpoint: GET api/switch/{id} (endpoint show)
                    $('#text-status').html(data); // merubah text html pada id:text-status sesuai data yang didapat.
                })
            }

            const getDataSystem = () => {
                $.get('/api/switch/1').done(data => { // ajax hit endpoint: GET api/switch/{id} (endpoint show)

                    // jika status switch bernilai true
                    if (data.status) {
                        $('#btn-system').html('ON'); // merubah text html pada id:btn-system menjadi text "ON".
                        $('#btn-system').removeClass('btn-outline'); // menghapus class "btn-outline" pada id:btn-system.
                        $('#btn-system').addClass('btn-neutral text-white'); // menambah class "btn-neutral text-white" pada id:btn-system.
                    }

                    // jika status switch bernilai false
                    else {
                        $('#btn-system').html('OFF'); // merubah text html pada id:btn-system menjadi text "OFF".
                        $('#btn-system').addClass('btn-outline'); // menambah class "btn-outline" pada id:btn-system.
                        $('#btn-system').removeClass('btn-neutral text-white'); // menghapus class "btn-neutral text-white" pada id:btn-system.
                    }
                })
            }

            const updateDataSystem = () => {
                $.post('/api/switch/1', { _method: 'PUT' }) // ajax hit endpoint: PUT api/switch/{id} (endpoint update)
                .done(data => {
                    getDataSystem();
                })
            }

        </script>
    </x-slot>
</x-app-layout>
