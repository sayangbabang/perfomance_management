<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{
    public function store(Request $req) {
        Log::info('Form submission started');
        // dd($req->all());
        $validateData = $req->validate([
            'tanggal' => 'required|string',
            'jenis' => 'required|in:hadir,izin,sakit,spj,lembur,weekly_report,cuti',
            'tipe' => 'nullable|in:kerja,libur|required_unless:jenis,weekly_report',
            'durasi' => 'nullable|string|required_if:jenis,hadir,lembur,spj',
            'justifikasi' => [
                'nullable',
                function ($attribute, $value, $fail) use ($req) {
                    if (($req->jenis === 'spj' || $req->jenis === 'lembur') && !$req->hasFile('justifikasi')) {
                        $fail($attribute.' is required when jenis is spj or lembur');
                    }
                },
                'file',
                'mimes:jpg,png,docx,pdf,jpeg',
                'max:10240'
            ],
            'deskripsi' => 'nullable|required_unless:jenis,hadir|string',
            'catatan_koreksi' => 'nullable|string',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
            'id_talent' => 'required|integer',
        ]);


//         if ($request->hasFile('justifikasi')) {
//             $validateData['justifikasi'] = $request->file('justifikasi')->store('justifikasi', 'public');
//         }

        // Combine latitude and longitude into one string
        $validateData['lokasi'] = "{$req->latitude}, {$req->longitude}";

        // Remove latitude and longitude from the array
        unset($validateData['latitude'], $validateData['longitude']);
        

        try {
            // Check if the file exists before attempting to store


            if ($req->hasFile('justifikasi')) {
                $validateData['justifikasi'] = $req->file('justifikasi')->store('justifikasi', 'public');
            }
    
            // Store the validated data in the database
            $manage = Manage::create($validateData);

            if (!$manage) {
                throw new \Exception('Failed to create record in database');
            }

            Log::info('Record created successfully', ['id' => $manage->id]);

            return redirect()->route('management.create')->with('success', 'Performance report submitted successfully.');
        } catch (\Exception $e) {
            Log::error('Error occurred while submitting the form', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'An error occurred while submitting the form: ' . $e->getMessage())->withInput();
        }
    }

    public function create() {
        return view('manage');
    }

    public function index() {
        $laporan = DB::table('laporan_performa')->get();
        return view('report', compact('laporan'));
    }
}