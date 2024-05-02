<div class="grid md:grid-cols-4 gap-4">
    @foreach ($companies as $company)
        <div class="bg-slate-100 dark:bg-slate-500 rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold dark:text-white">{{ $company->name }}</h2>
                <div class="flex gap-2">
                    <div class="flex-none">
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" class="w-16 h-16 rounded-lg">
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-700 dark:text-gray-200"> <strong>Description: </strong> {{ \Illuminate\Support\Str::limit($company->description, 25) }}</p>
                        <p class="text-gray-700 dark:text-gray-200"> <strong>Address: </strong> {{ $company->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
