<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use OwenIt\Auditing\Models\Audit;
use App\Models\User;

class AuditLog extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind'; // optional, use 'bootstrap' if you're using Bootstrap

    public function render()
    {
        $audits = Audit::latest()->paginate(8)->through(function ($audit) {
            return [
                'date' => $audit->created_at->format('Y-m-d H:i'),
                'user' => optional($audit->user)->name ?? 'Sistem',
                'event' => $audit->event,
                'model' => class_basename($audit->auditable_type),
                'branch' => $this->getBranchName($audit),
                'changes' => $this->formatChanges($audit),
            ];
        });

        return view('livewire.audit-log', [
            'audits' => $audits,
        ]);
    }

    private function getBranchName($audit)
    {
        if ($audit->auditable_type === User::class) {
            return '-';
        }

        $model = $audit->auditable;

        if ($model && method_exists($model, 'branch')) {
            return optional($model->branch)->name ?? '-';
        }

        if ($model && isset($model->branch_name)) {
            return $model->branch_name;
        }

        if ($model && isset($model->branch)) {
            return $model->branch;
        }

        return '-';
    }

    private function formatChanges($audit)
    {
        if ($audit->event === 'updated') {
            return collect($audit->getModified())->map(function ($value, $key) use ($audit) {
                $old = $audit->getOriginal()[$key] ?? '-';
                $oldStr = is_array($old) ? json_encode($old) : $old;
                $newStr = is_array($value) ? json_encode($value) : $value;

                return "`$key`: \"$oldStr\" → \"$newStr\"";
            })->values()->all();
        }

        return [];
    }
}
