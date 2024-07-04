<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(){
        $documents = Document::query()->get();
        return view('admin.documents.index', compact('documents'));
    }

    public function store(DocumentRequest $request) {
        Document::create($request->validated());

        return redirect()->route('admin.documents.index')->with('success', 'Document created successfully');
    }

    public function update(DocumentRequest $request, Document $document) {
        $document->update($request->validated());
        return redirect()->route('admin.documents.index')->with('success', 'Document updated successfully');
    }

    public function destroy(Document $document) {
        $document->delete();

        return redirect()->route('admin.documents.index')->with('success', 'Document deleted successfully');
    }
}

