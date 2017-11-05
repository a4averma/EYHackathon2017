<?php
namespace App\Http\Controllers;


use App\Law;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LawController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {

        $laws = Law::all();
        return view('welcome', compact('laws'));
    }
    public function search(Request $request) {
        $query = $request['q'];

        $laws = $query
            ? Law::where('keywords', 'LIKE', "%$query%")->get()
            : Law::all();
        return view('welcome', compact(['laws', 'query']));
    }

    public function document($id) {
        $law = Law::find($id);
        DB::table('laws')
            ->where('id', $id)
            ->update(['has_seen' => 1]);
        return view('document', compact('law'));
    }

    public function refresh() {
        exec('python3 ~/Sites/compliance/app/Http/Controllers/Scripts/main.py');
        return redirect()->back();
    }
}