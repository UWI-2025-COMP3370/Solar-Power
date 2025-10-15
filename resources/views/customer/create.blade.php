<x-app-layout>
  <div class="max-w-2xl mx-auto mt-8 bg-white p-6 rounded shadow">
      <h1 class="text-xl font-bold mb-4">Create Customer</h1>

      <form method="POST" action="{{ route('customers.store') }}">
          @csrf
          
          <div class="mb-4">
              <label for="name" class="block text-sm font-medium">Customer Name</label>
              <input type="text" id="name" name="name" class="w-full border rounded p-2" required>
          </div>

          <div class="mb-4">
              <label for="address" class="block text-sm font-medium">Address</label>
              <textarea id="address" name="address" rows="2" class="w-full border rounded p-2" required></textarea>
          </div>

          <div class="mb-4">
              <label for="mobile" class="block text-sm font-medium">Mobile Number</label>
              <input type="text" id="mobile" name="mobile" class="w-full border rounded p-2" required>
          </div>

          <div class="mb-4">
              <label for="telephone" class="block text-sm font-medium">Telephone Number (House)</label>
              <input type="text" id="telephone" name="telephone" class="w-full border rounded p-2">
          </div>

          <div class="mb-4">
              <label for="email" class="block text-sm font-medium">Email Address</label>
              <input type="email" id="email" name="email" class="w-full border rounded p-2" required>
          </div>

          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
              Create Customer
          </button>
      </form>
  </div>
</x-app-layout>
