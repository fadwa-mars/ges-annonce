<?php
namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    private $types = ['Appartement', 'Maison', 'Villa', 'Magasin', 'Terrain'];
    private $neufOptions = [1 => 'Neuf', 0 => 'Ancien'];

    public function index()
    {
        $annonces = Annonce::all();
        return view('annonce.index', compact('annonces'));
    }

    public function create()
    {
        $types = $this->types;
        $neufOptions = $this->neufOptions;
        return view('annonce.create', compact('types', 'neufOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre'       => 'required|string|min:3',
            'description' => 'required|string|min:3',
            'type'        => 'required|in:Appartement,Maison,Villa,Magasin,Terrain',
            'ville'       => 'required|string',
            'superficie'  => 'required|integer',
            'neuf'        => 'required|boolean',
            'prix'        => 'required|numeric',
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photo = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $request->titre . '-' . time() . '.' . $file->getClientOriginalExtension();
            $photo = $file->storeAs('annonces', $filename, 'public');
        }

        Annonce::create([
            'titre'       => $request->titre,
            'description' => $request->description,
            'type'        => $request->type,
            'ville'       => $request->ville,
            'superficie'  => $request->superficie,
            'neuf'        => $request->neuf,
            'prix'        => $request->prix,
            'photo'       => $photo,
        ]);

        return redirect()->route('annonce.index')->with('success', 'Annonce ajouté !');
    }

    public function show(Annonce $annonce)
    {
        return view('annonce.show', compact('annonce'));
    }

    public function edit(Annonce $annonce)
    {
        $types = $this->types;
        $neufOptions = $this->neufOptions;
        return view('annonce.edit', compact('annonce', 'types', 'neufOptions'));
    }

    public function update(Request $request, Annonce $annonce)
    {
        $request->validate([
            'titre'       => 'required|string|min:3',
            'description' => 'required|string|min:3',
            'type'        => 'required|in:Appartement,Maison,Villa,Magasin,Terrain',
            'ville'       => 'required|string',
            'superficie'  => 'required|integer',
            'neuf'        => 'required|boolean',
            'prix'        => 'required|numeric',
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photo = $annonce->photo;
        if ($request->hasFile('photo')) {
            if ($annonce->photo && Storage::disk('public')->exists($annonce->photo)) {
                Storage::disk('public')->delete($annonce->photo);
            }
            $file = $request->file('photo');
            $filename = $request->titre . '-' . time() . '.' . $file->getClientOriginalExtension();
            $photo = $file->storeAs('annonces', $filename, 'public');
        }

        $annonce->update([
            'titre'       => $request->titre,
            'description' => $request->description,
            'type'        => $request->type,
            'ville'       => $request->ville,
            'superficie'  => $request->superficie,
            'neuf'        => $request->neuf,
            'prix'        => $request->prix,
            'photo'       => $photo,
        ]);

        return redirect()->route('annonce.index')->with('success', 'Annonce modifié !');
    }

    public function destroy(Annonce $annonce)
    {
        if ($annonce->photo && Storage::disk('public')->exists($annonce->photo)) {
            Storage::disk('public')->delete($annonce->photo);
        }
        $annonce->delete();
        return redirect()->route('annonce.index')->with('success', 'Annonce supprimé !');
    }

    public function dashboard()
    {
        $stats = [
            'total'            => Annonce::count(),
            'prix_total'       => Annonce::sum('prix'),
            'prix_moyen'       => Annonce::avg('prix'),
            'superficie_total' => Annonce::sum('superficie'),
        ];
        return view('annonce.dashboard', compact('stats'));
    }
}