<?php

namespace App\Exports;

use App\Models\Journal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JournalExport implements FromCollection, WithHeadings
{
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function collection()
    {
        return Journal::where('user_id', $this->userId)
            ->orderBy('tanggal', 'asc')
            ->get([
                'tanggal',
                'hari',
                'unit_kerja',
                'catatan',
            ]);
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Hari',
            'Unit Kerja',
            'Catatan',
        ];
    }
}