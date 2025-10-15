<x-app-layout>
    <form method="POST" action="{{ route('visit.store') }}">
        @csrf
        
        <!-- Technician Name -->
        <div>
            <x-input-label for="technician_name" :value="__('Technician Name')" />
            <x-text-input id="technician_name" class="block mt-1 w-full"
                type="text" name="technician_name" :value="old('technician_name')"
                required autofocus autocomplete="technician_name" />
            <x-input-error :messages="$errors->get('technician_name')"
                class="mt-2" />
        </div>

        <!-- Customer Name -->
        <div>
            <x-input-label for="customer_name" :value="__('Customer Name')" />
            <x-text-input id="customer_name" class="block mt-1 w-full"
                type="text" name="customer_name" :value="old('customer_name')"
                required autofocus autocomplete="customer_name" />
            <x-input-error :messages="$errors->get('customer_name')"
                class="mt-2" />
        </div>
        
        <!-- Customer Email-->
        <div>
            <x-input-label for="customer_email" :value="__('Customer Email')" />
            <x-text-input id="customer_email" class="block mt-1 w-full"
                type="email" name="customer_email" :value="old('customer_email')"
                required autocomplete="email" />
            <x-input-error :messages="$errors->get('customer_email')" class="mt-2" />
        </div>


        <!-- Roof Size -->
        <div>
            <x-input-label for="roof_size" :value="__('Roof Size (sq. ft)')" />
            <x-text-input id="roof_size" class="block mt-1 w-full"
                type="text" name="roof_size" :value="old('roof_size')"
                required autocomplete="roof_size" />
            <x-input-error :messages="$errors->get('roof_size')" class="mt-2" />
        </div>

        <!-- Roof Type -->
        <div>
            <x-input-label for="roof_type" :value="__('Roof Type')" />
            <x-text-input id="roof_type" class="block mt-1 w-full"
                type="text" name="roof_type" :value="old('roof_type')"
                required autocomplete="roof_type" />
            <x-input-error :messages="$errors->get('roof_type')" class="mt-2" />
        </div>

        <!-- Monthly Consumption (kWh) -->
        <div>
            <x-input-label for="monthly_consumption_kwh" :value="__('Monthly Consumption (kWh)')" />
            <x-text-input id="monthly_consumption_kwh" class="block mt-1 w-full"
                type="number" step="0.01" name="monthly_consumption_kwh"
                :value="old('monthly_consumption')" required autocomplete="monthly_consumption_kwh" />
            <x-input-error :messages="$errors->get('monthly_consumption')" class="mt-2" />
        </div>

        <!-- Shaded -->
        <div>
            <x-input-label for="shaded" :value="__('Shaded')" />
            <select id="shaded" name="shaded" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="" disabled selected>-- Select Option --</option>
                <option value="Yes" {{ old('shaded') == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value="No" {{ old('shaded') == 'No' ? 'selected' : '' }}>No</option>
                <option value="Partially" {{ old('shaded') == 'Partially' ? 'selected' : '' }}>Partially</option>
            </select>
            <x-input-error :messages="$errors->get('shaded')" class="mt-2" />
        </div>

        <!-- Notes -->
        <div>
            <x-input-label for="notes" :value="__('Notes')" />
            <textarea id="notes" name="notes" rows="4"
                class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('notes') }}</textarea>
            <x-input-error :messages="$errors->get('notes')" class="mt-2" />
        </div>

        <div>
            <x-primary-button class="ml-4">
                {{ __('Create') }}
            </x-primary-button>
        </div>

    </form>
</x-app-layout>
