<x-app-layout>
    @auth
        <h3>piDSS Visit</h3>
        <div>
            {{ $visit->technician_name }}, {{ $visit->customer_name }}, {{ $visit->customer_email }}, {{ $visit->roof_size }},
            {{ $visit->roof_type }}, {{ $visit->monthly_consumption_kwh }}, {{ $visit->shaded }}, {{ $visit->notes }},
        </div>
@endauth
</x-app-layout>
