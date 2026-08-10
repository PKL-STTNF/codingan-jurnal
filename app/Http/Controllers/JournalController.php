<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    public function index(Request $request)
    {
       $query = Journal::where('user_id', Auth::id());

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('hari', 'like', '%' . $request->search . '%')
                  ->orWhere('unit_kerja', 'like', '%' . $request->search . '%');
    });

    }

        $journals = $query->latest()->paginate(10)->withQueryString();

        return view('journals.index', compact('journals'));
    }

    public function create()
    {

        return view('journals.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'hari' => 'required',
            'unit_kerja' => 'required',
            'catatan' => 'nullable',
          
        ]);

        Journal::create([
            'user_id' => Auth::id(),
            'tanggal' => $request->tanggal,
            'hari' => $request->hari,
            'unit_kerja' => $request->unit_kerja,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('journals.index')
                ->with('success','Data berhasil ditambahkan');
        }


    public function edit(Journal $journal)
    {
        if ($journal->user_id != Auth::id()) {
        abort(403);
    }

    return view('journals.edit', compact('journal'));
    }



    public function update(Request $request, Journal $journal)
    {
        $request->validate([
            'tanggal' => 'required',
            'hari' => 'required',
            'unit_kerja' => 'required',
            'catatan' => 'nullable',
        
    ]);

        $journal->update([
            'tanggal' => $request->tanggal,
            'hari' => $request->hari,
            'unit_kerja' => $request->unit_kerja,
            'catatan' => $request->catatan,
    
    ]);

        return redirect()->route('journals.index')
          ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Journal $journal)
    {
         if ($journal->user_id != Auth::id()) {
        abort(403);
    }
    
        $journal->delete();

        return redirect()->route('journals.index')
          ->with('success', 'Data berhasil dihapus');
    }

}
