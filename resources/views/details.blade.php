<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8 dark:text-white">

            <details>
                <summary> What are solar photovoltaic (PV) systems?
                </summary>

                <p>A solar photovoltaic (PV) system is a technology that converts sunlight directly into
                    electricity using solar panels composed of photovoltaic cells. It essentially transforms light
                    energy from the sun into usable electrical energy that can power homes, businesses and industries. 
                </p>
            </details>
            <br>
            <details>
                <summary>
                    What are the components of a solar PV system?
                </summary>
                <p>
                    A solar PV system consists of several key components that work together to generate, manage and
                    deliver power. These include solar panels, an inverter, a mounting structure and cabling.
                    Each solar panel contains many small
                    photovoltaic cells made of semiconductor materials, such as silicon, and these cells absorb sunlight
                    and generate direct current (DC) electricity.
                    Additionally, batteries and charge controllers are often used.
                    DC electricity is electricity that flows steadily in a
                    single direction through a conductor.
                    Since most electrical appliances and grid systems operate on alternating current (AC), the DC
                    electricity must be converted. An inverter converts the DC output from these cells into alternating
                    current (AC) power that can be used to run household appliances, lighting and other electrical
                    systems.
                    The mounting structure ensures that the panels are securely positioned on rooftops or the ground at
                    an
                    angle that maximizes sunlight exposure. In systems that have energy storage capabilities, batteries
                    store excess electricity for later use, while charge controllers help regulate the flow of energy so
                    as
                    to prevent battery damage.
                </p>
            </details>
            <br>
            <details>
                <summary>
                    How many types of solar PV systems are there?

                </summary>
                <p>
                    Solar PV systems can be divided into three main types: grid-tied, off-grid and hybrid systems.
                    Grid-tied systems are connected to the public electricity grid which allow users to feed excess power back
                    into
                    the grid. Off-grid systems operate independently from the public grid and rely on batteries for
                    storage,
                    making them suitable for remote areas without grid access. Hybrid systems combine features of both
                    providing flexibility and backup power during outages.
                </p>
            </details>
            <br>
            <details>
                <summary>
                    What are the benefits of solar PV sysytems?
                </summary>
                <p>
                    Benefits of solar PV systems:
                </p>

                <ul class="list-disc list-inside">
                    <li>Solar PV systems generate free electricity from sunlight, reducing your reliance on the utility grid.</li>
                    <li>Any excess energy can often be sold back to the grid, providing additional savings or income.</li>
                    <li>Solar PV systems produce clean, renewable energy with no greenhouse gas emissions or air pollution.</li>
                    <li>Generating your own power reduces dependence on grid electricity, protecting you from rising energy prices and power outages.</li>
                    <li>Solar PV systems can be installed on rooftops or open land and can be easily expanded as energy needs grow.</li>
                    <li>Solar PV systems have few moving parts which require minimal maintenance.</li>
                    <li>Solar PV systems typically pay for themselves through lower utility bills.</li>
                    <li>Governments offer tax credits, rebates and grants to reduce the upfront cost of installation.</li>
                </ul>

            </details>


        </div>
    </div>
</body>

</html>
