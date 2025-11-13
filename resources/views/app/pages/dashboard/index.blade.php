<x-layout>
    <div class="p-6 space-y-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <x-card title="Total Patients" :value="$total_patients" icon="users" />
            <x-card title="New Today" :value="$new_today" icon="user-plus" />
            <x-card
                title="Vitals Alerts"
                :value="$alerts"
                icon="alert-circle"
                tone="danger"
            />
        </div>

        <x-quick-links
            title="Patient Management"
            :links="[
                [
                    'href' => route('patients.create.page'),
                    'label' => 'New Patient',
                    'description' => 'Register a new patient',
                    'icon' => 'plus',
                    'tone' => 'primary'
                ],
                [
                    'href' => route('patients.index.page'),
                    'label' => 'View All Patients',
                    'description' => 'Browse patient records',
                    'icon' => 'users',
                    'tone' => 'secondary'
                ],
            ]"
        />
    </div>
</x-layout>
