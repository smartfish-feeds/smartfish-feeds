<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
      {{ __('Schedule') }}
      <a href="{{ route('schedule.create') }}" class="btn btn-sm btn-neutral">Add Data</a>
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          @if (session('success'))
            <div role="alert" class="alert alert-success text-white mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>{{ session('success') }}</span>
            </div>
          @endif

          <div class="overflow-x-auto">
            <table class="table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($schedules as $schedule)
                  <tr class="hover">
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $schedule->name }}</td>
                    <td>{{ $schedule->time }}</td>
                    <td>
                      <a href="{{ route('schedule.edit', ['schedule' => $schedule->id]) }}">
                        <button type="button" class="btn btn-outline btn-info btn-xs">edit</button>
                      </a>
                      <form action="{{ route('schedule.destroy', ['schedule' => $schedule->id]) }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline btn-error btn-xs mt-1 sm:mt-0"
                          onclick="return confirm('Are you sure you want to delete?')">delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
