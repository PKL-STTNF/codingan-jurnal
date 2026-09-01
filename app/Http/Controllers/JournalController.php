<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class JournalController extends Controller
{
    public function index(Request $request)
    {
        $query = Journal::where('user_id', Auth::id());

        // =========================
        // PENCARIAN
        // =========================

        if ($request->search) {

            $query->where(function ($q) use ($request) {

                $q->where('hari', 'like', '%' . $request->search . '%')
                    ->orWhere('unit_kerja', 'like', '%' . $request->search . '%')
                    ->orWhere('catatan', 'like', '%' . $request->search . '%');

            });

        }

        // =========================
        // DATA PER HALAMAN
        // =========================

        $perPage = in_array(
            $request->integer('per_page'),
            [10, 25, 50, 100]
        )
            ? $request->integer('per_page')
            : 50;

        $journals = $query
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view('journals.index', compact('journals'));
    }


    public function create()
    {
        return view('journals.create');
    }


    // =========================
    // SIMPAN JURNAL
    // =========================

    public function store(Request $request)
    {
        $request->validate([

            'tanggal' => [
                'required',
                'date'
            ],

            'unit_kerja' => [
                'required',
                'string'
            ],

            'catatan' => [
                'nullable',
                'string'
            ],

            'dokumentasi' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120'
            ],

        ]);


        // =========================
        // UPLOAD FOTO
        // =========================

        $dokumentasi = null;

        if ($request->hasFile('dokumentasi')) {

            $dokumentasi = $request
                ->file('dokumentasi')
                ->store('dokumentasi', 'public');

        }


        // =========================
        // SIMPAN JURNAL
        // =========================

        Journal::create([

            'user_id' => Auth::id(),

            'tanggal' => $request->tanggal,

            'hari' => Carbon::parse(
                $request->tanggal
            )->translatedFormat('l'),

            'unit_kerja' => $request->unit_kerja,

            'catatan' => $request->catatan,

            'dokumentasi' => $dokumentasi,

        ]);


        return redirect()
            ->route('journals.index')
            ->with(
                'success',
                'Jurnal berhasil ditambahkan.'
            );
    }


    // =========================
    // EDIT
    // =========================

    public function edit(Journal $journal)
    {
        if ($journal->user_id != Auth::id()) {

            abort(403);

        }

        return view(
            'journals.edit',
            compact('journal')
        );
    }


    // =========================
    // UPDATE
    // =========================

    public function update(
        Request $request,
        Journal $journal
    ) {

        if ($journal->user_id !== Auth::id()) {

            abort(403);

        }


        $request->validate([

            'tanggal' => [
                'required',
                'date'
            ],

            'unit_kerja' => [
                'required',
                'string'
            ],

            'catatan' => [
                'nullable',
                'string'
            ],

            'dokumentasi' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120'
            ],

            'remove_dokumentasi' => [
                'nullable',
                'boolean'
            ],

        ]);


        // =========================
        // DATA YANG AKAN DIUPDATE
        // =========================

        $data = [

            'tanggal' => $request->tanggal,

            'hari' => Carbon::parse(
                $request->tanggal
            )->translatedFormat('l'),

            'unit_kerja' => $request->unit_kerja,

            'catatan' => $request->catatan,

        ];


        // =========================
        // JIKA UPLOAD FOTO BARU
        // =========================

        if ($request->hasFile('dokumentasi')) {

            // Hapus foto lama
            if (
                $journal->dokumentasi &&
                Storage::disk('public')->exists(
                    $journal->dokumentasi
                )
            ) {

                Storage::disk('public')->delete(
                    $journal->dokumentasi
                );

            }


            // Upload foto baru
            $data['dokumentasi'] = $request
                ->file('dokumentasi')
                ->store('dokumentasi', 'public');

        } elseif ($request->boolean('remove_dokumentasi')) {

            // =========================
            // HAPUS FOTO (TANPA UPLOAD BARU)
            // =========================

            if (
                $journal->dokumentasi &&
                Storage::disk('public')->exists(
                    $journal->dokumentasi
                )
            ) {

                Storage::disk('public')->delete(
                    $journal->dokumentasi
                );

            }

            $data['dokumentasi'] = null;

        }


        // =========================
        // UPDATE DATABASE
        // =========================

        $journal->update($data);


        return redirect()
            ->route('journals.index')
            ->with(
                'success',
                'Data berhasil diupdate.'
            );
    }


    // =========================
    // HAPUS
    // =========================

    public function destroy(Journal $journal)
    {
        if ($journal->user_id != Auth::id()) {

            abort(403);

        }


        // =========================
        // HAPUS FOTO
        // =========================

        if (
            $journal->dokumentasi &&
            Storage::disk('public')->exists(
                $journal->dokumentasi
            )
        ) {

            Storage::disk('public')->delete(
                $journal->dokumentasi
            );

        }


        // =========================
        // HAPUS JURNAL
        // =========================

        $journal->delete();


        return redirect()
            ->route('journals.index')
            ->with(
                'success',
                'Data berhasil dihapus.'
            );
    }
}