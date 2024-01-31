<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      <a href="{{ route('schedule.index') }}">{{ __('Schedule') }}</a>
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <form action="{{ route('schedule.store') }}" method="POST">
            @csrf
            <div class="mb-4">
              <label for="name" class="block text-gray-600 text-sm font-semibold mb-2">Name:</label>
              <input type="text" name="name" id="name" class="input input-bordered w-full max-w-xs"
                value="{{ old('name') }}" placeholder="Type here">
              <div class="label">
                <div class="label-text-alt text-error">{{ $errors->first('name') }}</div>
              </div>
            </div>

            <div class="mb-4">
              <label for="time" class="block text-gray-600 text-sm font-semibold mb-2">Time:</label>
              <input type="time" name="time" id="time" class="input input-bordered w-full max-w-xs"
                value="{{ old('time') }}">
              <div class="label">
                <div class="label-text-alt text-error">{{ $errors->first('time') }}</div>
              </div>
            </div>

            <div class="mt-4">
              <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Add Data</button>
              <a href="{{ route('schedule.index') }}">
                <button type="button" class="bg-neutral-500 text-white py-2 px-4 rounded">Back</button>
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
