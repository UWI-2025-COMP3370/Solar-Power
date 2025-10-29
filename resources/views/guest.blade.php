<x-guest-layout :wide="true">
    <div class="text-gray-900 dark:text-gray-100">

        <!-- Page Title -->
        <h1 class="text-3xl font-bold mb-6 text-center">Understanding Solar Photovoltaic (PV) Systems</h1>
        <p class="text-center text-gray-600 dark:text-gray-400 mb-8">
            Learn how solar energy works and how it can benefit your home or business.
        </p>

        <!-- Details Sections -->
        <div class="space-y-6">

            <details class="p-4 bg-gray-50 dark:bg-gray-800 rounded-xl shadow-sm">
                <summary class="font-semibold text-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500 focus:rounded-md">
                    What are solar PV systems?
                </summary>
                <p class="mt-2 text-gray-700 dark:text-gray-300">
                    A solar PV system converts sunlight directly into electricity using solar panels composed of photovoltaic cells.
                    It transforms light energy from the sun into usable electrical energy for homes, businesses, and industries.
                </p>
            </details>

            <details class="p-4 bg-gray-50 dark:bg-gray-800 rounded-xl shadow-sm">
                <summary class="font-semibold text-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500 focus:rounded-md">
                    Components of a solar PV system
                </summary>
                <p class="mt-2 text-gray-700 dark:text-gray-300">
                    Key components include solar panels, inverter, mounting structure, cabling, batteries, and charge controllers.
                    Solar panels absorb sunlight and generate DC electricity. Inverters convert this to AC electricity for home and grid use.
                    Batteries store excess energy and charge controllers prevent battery damage.
                </p>
            </details>

            <details class="p-4 bg-gray-50 dark:bg-gray-800 rounded-xl shadow-sm">
                <summary class="font-semibold text-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500 focus:rounded-md">
                    Types of solar PV systems
                </summary>
                <p class="mt-2 text-gray-700 dark:text-gray-300">
                    Solar PV systems are typically classified as:
                    <ul class="list-disc list-inside mt-2 space-y-1">
                        <li><strong>Grid-tied:</strong> Connected to the utility grid, excess power can be fed back.</li>
                        <li><strong>Off-grid:</strong> Independent from the grid, relies on batteries.</li>
                        <li><strong>Hybrid:</strong> Combines both, providing backup and flexibility.</li>
                    </ul>
                </p>
            </details>

            <details class="p-4 bg-gray-50 dark:bg-gray-800 rounded-xl shadow-sm">
                <summary class="font-semibold text-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500 focus:rounded-md">
                    Benefits of solar PV systems
                </summary>
                <ul class="list-disc list-inside mt-2 space-y-1 text-gray-700 dark:text-gray-300">
                    <li>Generate free electricity from sunlight, reducing reliance on the grid.</li>
                    <li>Sell excess energy back to the grid for savings or income.</li>
                    <li>Produce clean, renewable energy with no greenhouse gas emissions.</li>
                    <li>Reduce dependence on grid electricity, protecting against outages and rising costs.</li>
                    <li>Easy installation on rooftops or open land, expandable as needs grow.</li>
                    <li>Few moving parts, minimal maintenance required.</li>
                    <li>Potential savings from lower utility bills and government incentives.</li>
                </ul>
            </details>

        </div>

        <!-- Back Button -->
        <div class="mt-8 text-center">
            <x-primary-button class="bg-gray-500 hover:bg-gray-600">
                <a href="{{ url()->previous() }}">{{ __('Back') }}</a>
            </x-primary-button>
        </div>

    </div>
</x-guest-layout>
