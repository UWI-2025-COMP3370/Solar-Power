<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8 bg-white dark:bg-gray-900 p-6 rounded shadow text-gray-900 dark:text-gray-100">
        <h1 class="text-2xl font-bold mb-6 text-center">Understanding Solar Photovoltaic (PV) Systems</h1>
        <p class="text-center text-gray-600 dark:text-gray-400 mb-8">
            Learn how solar energy works and how it can benefit your home or business.
        </p>

        <div class="space-y-6">

            <details class="p-4 bg-gray-50 dark:bg-gray-800 rounded-xl shadow-sm">
                <summary class="font-semibold text-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500 focus:rounded-md">
                    What are solar photovoltaic (PV) systems?
                </summary>
                <p class="mt-2 text-gray-700 dark:text-gray-300">
                    A solar photovoltaic (PV) system is a technology that converts sunlight directly into
                    electricity using solar panels composed of photovoltaic cells. It essentially transforms light
                    energy from the sun into usable electrical energy that can power homes, businesses and industries.
                </p>
            </details>

            <details class="p-4 bg-gray-50 dark:bg-gray-800 rounded-xl shadow-sm">
                <summary class="font-semibold text-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500 focus:rounded-md">
                    What are the components of a solar PV system?
                </summary>
                <p class="mt-2 text-gray-700 dark:text-gray-300">
                    A solar PV system consists of several key components that work together to generate, manage and
                    deliver power. These include solar panels, an inverter, a mounting structure and cabling.
                    Each solar panel contains many small photovoltaic cells made of semiconductor materials, such as
                    silicon, and these cells absorb sunlight and generate direct current (DC) electricity.
                    Additionally, batteries and charge controllers are often used.
                    Since most electrical appliances and grid systems operate on alternating current (AC), the DC
                    electricity must be converted. An inverter converts the DC output from these cells into
                    alternating current (AC) power that can be used to run household appliances, lighting and other
                    electrical systems.
                    The mounting structure ensures that the panels are securely positioned on rooftops or the ground at
                    an angle that maximizes sunlight exposure. In systems that have energy storage capabilities,
                    batteries store excess electricity for later use, while charge controllers help regulate the flow of
                    energy so as to prevent battery damage.
                </p>
            </details>

            <details class="p-4 bg-gray-50 dark:bg-gray-800 rounded-xl shadow-sm">
                <summary class="font-semibold text-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500 focus:rounded-md">
                    How many types of solar PV systems are there?
                </summary>
                <p class="mt-2 text-gray-700 dark:text-gray-300">
                    Solar PV systems can be divided into three main types: grid-tied, off-grid and hybrid systems.
                    Grid-tied systems are connected to the public electricity grid which allows users to feed excess
                    power back into the grid. Off-grid systems operate independently from the public grid and rely on
                    batteries for storage, making them suitable for remote areas without grid access. Hybrid systems
                    combine features of both, providing flexibility and backup power during outages.
                </p>
            </details>

            <details class="p-4 bg-gray-50 dark:bg-gray-800 rounded-xl shadow-sm">
                <summary class="font-semibold text-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500 focus:rounded-md">
                    What are the benefits of solar PV systems?
                </summary>
                <div class="mt-2 text-gray-700 dark:text-gray-300">
                    <p>Benefits of solar PV systems:</p>
                    <ul class="list-disc list-inside mt-2 space-y-1">
                        <li>Solar PV systems generate free electricity from sunlight, reducing your reliance on the utility grid.</li>
                        <li>Any excess energy can often be sold back to the grid, providing additional savings or income.</li>
                        <li>Solar PV systems produce clean, renewable energy with no greenhouse gas emissions or air pollution.</li>
                        <li>Generating your own power reduces dependence on grid electricity, protecting you from rising energy prices and power outages.</li>
                        <li>Solar PV systems can be installed on rooftops or open land and can be easily expanded as energy needs grow.</li>
                        <li>Solar PV systems have few moving parts which require minimal maintenance.</li>
                        <li>Solar PV systems typically pay for themselves through lower utility bills.</li>
                        <li>Governments offer tax credits, rebates and grants to reduce the upfront cost of installation.</li>
                    </ul>
                </div>
            </details>

        </div>
    </div>
    <!-- Back Button -->
    <x-primary-button class="mt-4 bg-gray-500 hover:bg-gray-600">
        <a href="{{ url()->previous() }}">{{ __('Back') }}</a>
    </x-primary-button>
</x-app-layout>
