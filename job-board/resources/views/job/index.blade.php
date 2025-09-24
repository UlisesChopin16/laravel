<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('offered_jobs.index')]" />
    <x-card class="mb-4 text-sm" x-data="">
        <form id="filters" action="{{ route('offered_jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <text-input name="search" value="{{ request('search') }}" placeholder="Search for any text"
                        form-ref="filters" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>

                    <div class="flex space-x-2">
                        <div>
                            <text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From"
                            form-ref="filters" />
                        </div>
                        <div>
                            <text-input name="max_salary" value="{{ (string) request('max_salary') }}" placeholder="To"
                            form-ref="filters" />
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group name="experience" :options="array_combine(
                        array_map('ucfirst', \App\Models\OfferedJob::$experience),
                        \App\Models\OfferedJob::$experience,
                    )" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-group name="category" :options="\App\Models\OfferedJob::$categories" />
                </div>
            </div>

            <x-button class="w-full">Filter</x-button>
        </form>
    </x-card>
    @foreach ($offered_jobs as $job)
        <x-job-card class="mb-4" :$job>
            <div>
                {{-- <a class="rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-center text-sm font-semibold text-black shadow-sm hover:bg-slate-100 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                href="{{ route('offered_jobs.show', $job) }}">View Details</a> --}}
                <x-link-button :href="route('offered_jobs.show', $job)">
                    View Details
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
