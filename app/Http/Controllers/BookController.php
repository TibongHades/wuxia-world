<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Barryvdh\DomPDF\Facade\Pdf;
use Inertia\Inertia;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $books = Book::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%$search%");
        })->orderBy('id')->get();

        return inertia('BookList', [
            'books' => $books
        ]);
    }

    public function pdf()
    {
        $books = Book::all();

        foreach ($books as $book) {

            $book->qrCode = QrCode::size(100)->generate($book->id);
        }
        $pdf = Pdf::loadView('book-list', compact('books'));
        return $pdf->download('book-list.pdf');
    }

    public function generateCSV()
    {
        $books = Book::orderBy('id')->get();
        $filename = '../storage/booklist.csv';
        $file = fopen($filename, 'w+');

        fputcsv($file, [
            'ID',
            'Title',
            'Description',
            'Chapters',
            'Rating',
            'Book Cover',
        ]);

        foreach ($books as $bk) {
            fputcsv($file, [
                $bk->id,
                $bk->title,
                $bk->description,
                $bk->chapters,
                $bk->rating,
                $bk->book_cover,
            ]);
        }

        fclose($file);
        return response()->download($filename);
    }
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return inertia('BookDetail', ['book' => $book]);
    }

    public function showUploadForm()
    {
        return view('upload_csv_form');
    }

    public function uploadCSV(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048'
        ]);

        if ($file = $request->file('csv_file')) {
            $filePath = $file->getRealPath();
            $file = fopen($filePath, 'r');


            Log::info('CSV file path: ' . $filePath);

            $header = fgetcsv($file);


            Log::info('CSV headers: ' . json_encode($header));

            while ($columns = fgetcsv($file)) {
                if ($columns[0] == "") {
                    continue;
                }

                $data = array_combine($header, $columns);

                try {

                    Log::info('CSV row data: ' . json_encode($data));


                    Book::create([
                        'title' => $data['title'],
                        'description' => $data['description'],
                        'chapters' => $data['chapters'],
                        'rating' => $data['rating'],
                        'book_cover' => $data['book_cover'],
                    ]);
                } catch (\Exception $e) {
                    Log::error('Error uploading CSV: ' . $e->getMessage());
                    return Redirect::route('upload-csv-form')->with('error', 'Failed to upload CSV');
                }
            }

            fclose($file);
        }

        return Redirect::route('upload-csv-form')->with('success', 'Books uploaded successfully');
    }

    public function allQrBooks()
    {
        $books = Book::all();
        $qrCodes = [];

        foreach ($books as $book) {
            $url = url('/books/' . $book->id);
            $qrCodes[$book->id] = QrCode::size(200)->generate($url);
        }

        return view('allQrbooks', compact('books', 'qrCodes'));
    }
    public function scan() {
        return view('scanner');
    }
}
