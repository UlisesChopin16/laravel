<x-layout>
    @foreach ($offered_jobs as $job)
        <x-card class="mb-4">
            <div class="mb-4 flex justify-between">
                <h2 class="text-lg font-medium">
                    {{ $job->title }}
                </h2>
                <div class="text-slate-500">
                    ${{ number_format($job->salary) }}
                </div>
            </div>
            <p>{!! nl2br($job->description) !!}</p>
        </x-card>
    @endforeach
</x-layout>
