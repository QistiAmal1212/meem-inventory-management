<div class="m-8">
    <div class="overflow-hidden rounded-md shadow-md">
        <!-- Header -->
        <div class="bg-[#f5f6f8] rounded-t-md">
            <table class="w-full table-fixed text-sm font-['Inter']">
                <thead class="text-slate-600 text-xs font-semibold leading-tight">
                    <tr>
                        <th class="text-left px-6 py-4">User</th>
                        <th class="text-left px-6 py-4">Entity ID</th>
                        <th class="text-left px-6 py-4">Change Type</th>
                        <th class="text-left px-6 py-4">Entity Type</th>
                        <th class="text-left px-6 py-4">Environment</th>
                        <th class="text-left px-6 py-4">Timestamp</th>
                        <th class="text-left px-6 py-4">Action</th>
                    </tr>
                </thead>
            </table>
        </div>

        <!-- Body -->
        <table class="w-full table-fixed text-sm font-['Inter']">
            <tbody class="text-slate-700 divide-y divide-gray-200 bg-white">
                @foreach ($audits as $audit)
                    <tr class="hover:bg-gray-50 transition {{ $loop->index === 1 ? 'bg-yellow-50' : '' }}">
                        <td class="flex items-center gap-3 px-6 py-3">
                            <div class="w-8 h-8 flex items-center justify-center rounded-full border border-violet-500 bg-violet-200 text-violet-800 text-xs font-semibold uppercase">
                                {{ \Str::of($audit['user'])->split('/\s+/')->map(fn($p) => substr($p, 0, 1))->take(2)->implode('') }}
                            </div>
                            <div>
                                <div class="text-gray-900 font-medium">{{ $audit['user'] }}</div>
                                <div class="text-xs text-gray-500">{{ $audit['role'] ?? 'Owner' }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-3">{{ \Str::limit($audit['entity_id'], 12, '...') }}</td>

                        {{-- Change Type with colors --}}
                        <td class="px-6 py-3 font-medium
                            {{ 
                                match(strtolower($audit['event'])) {
                                    'create', 'publish' => 'text-green-600',
                                    'delete', 'unpublish' => 'text-red-600',
                                    'update' => 'text-amber-500',
                                    default => 'text-gray-600'
                                }
                            }}
                        ">
                            {{ strtoupper($audit['event']) }}
                        </td>

                        <td class="px-6 py-3">{{ $audit['model'] }}</td>
                        <td class="px-6 py-3">{{ $audit['branch'] }}</td>
                        <td class="px-6 py-3 text-xs text-slate-500">{{ $audit['date'] }}</td>
                        <td class="px-6 py-3">
                            <button class="hover:scale-105 transition-transform duration-150">
                                <!-- Eye icon -->
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 12C1 12 5 5 12 5C19 5 23 12 23 12C23 12 19 19 12 19C5 19 1 12 1 12Z"
                                        stroke="#3B82F6" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <circle cx="12" cy="12" r="3" stroke="#3B82F6" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $audits->links() }}
    </div>
</div>
