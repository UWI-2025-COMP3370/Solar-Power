<x-app-layout>
  <div class="max-w-2xl mx-auto mt-8 bg-white p-6 rounded shadow">
      <h1 class="text-xl font-bold mb-4">Create Customer</h1>

      <form method="POST" action="{{ route('customer.store') }}">
          @csrf
          
          <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Customer Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full border rounded p-2" required>

                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
          </div>

          <div class="mb-4">
                <label for="address" class="block text-sm font-medium">Address</label>
                <textarea id="address" name="address" rows="2" class="w-full border rounded p-2" required>{{ old('address') }}</textarea>


                @error('address')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
          </div>

          <div class="mb-4">
                <label for="mobile" class="block text-sm font-medium">Mobile Number</label>
                <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}" class="w-full border rounded p-2" required>

                @error('mobile')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
          </div>

          <div class="mb-4">
                <label for="telephone" class="block text-sm font-medium">Telephone Number (House)</label>
                <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}"class="w-full border rounded p-2">

                @error('telephone')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
          </div>

          <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"class="w-full border rounded p-2" required>

                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
          </div>

          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
              Create Customer
          </button>
      </form>
  </div>
</x-app-layout>
