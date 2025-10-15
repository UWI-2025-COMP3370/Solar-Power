<x-app-layout>
  <div class="max-w-2xl mx-auto mt-8 bg-white p-6 rounded shadow">
      <h1 class="text-xl font-bold mb-4">Edit Customer</h1>

      <form method="POST" action="{{ route('customer.update', $customer) }}">
          @csrf
          @method('PUT')

          <div class="mb-4">
              <label class="block text-sm font-medium">Customer Name</label>
              <input type="text" name="name" value="{{ old('name', $customer->name) }}" class="w-full border rounded p-2" required>
          </div>

          <div class="mb-4">
              <label class="block text-sm font-medium">Address</label>
              <textarea name="address" rows="2" class="w-full border rounded p-2" required>{{ old('address', $customer->address) }}</textarea>
          </div>

          <div class="mb-4">
              <label class="block text-sm font-medium">Mobile Number</label>
              <input type="text" name="mobile" value="{{ old('mobile', $customer->mobile) }}" class="w-full border rounded p-2" required>
          </div>

          <div class="mb-4">
              <label class="block text-sm font-medium">Telephone</label>
              <input type="text" name="telephone" value="{{ old('telephone', $customer->telephone) }}" class="w-full border rounded p-2">
          </div>

          <div class="mb-4">
              <label class="block text-sm font-medium">Email</label>
              <input type="email" name="email" value="{{ old('email', $customer->email) }}" class="w-full border rounded p-2" required>
          </div>

          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Customer</button>
      </form>
  </div>
</x-app-layout>
