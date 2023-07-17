<x-app-layout>

    <x-page.header title="my_stats::dashboards.index" create="my_stats::dashboards.create"></x-page.header>
    <x-main>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Created</th>
                    <th>Name</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
        </table>
        @push('scripts')
        <script type="text/javascript" src="{{ asset('js/scripts/my_stats/my_stats_management.js') }}?{{config('app.version')}}"></script>
        @endpush
    </x-main>
</x-app-layout>
