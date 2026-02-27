<div class="mb-3">
    <label for="titre">Titre</label>
    <input value="{{ old('titre', $annonce->titre ?? '') }}"
        name="titre" type="text"
        class="form-control @error('titre') is-invalid @enderror">
    @error('titre')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="description">Description</label>
    <input value="{{ old('description', $annonce->description ?? '') }}"
        name="description" type="text"
        class="form-control @error('description') is-invalid @enderror">
    @error('description')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="type">Type</label>
    <select name="type" id="type"
        class="form-control @error('type') is-invalid @enderror">
        <option value=''>Séléctionner un Type</option>
        @foreach($types as $type)
            <option value="{{ $type }}"
                {{ (old('type', $annonce->type ?? '') == $type) ? 'selected' : '' }}>
                {{ $type }}
            </option>
        @endforeach
    </select>
    @error('type')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="ville">Ville</label>
    <input value="{{ old('ville', $annonce->ville ?? '') }}"
        name="ville" type="text"
        class="form-control @error('ville') is-invalid @enderror">
    @error('ville')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3 input-group">
    <input value="{{ old('superficie', $annonce->superficie ?? '') }}"
        name="superficie" type="number" placeholder="Superficie"
        class="form-control @error('superficie') is-invalid @enderror">
    <span class="input-group-text">m²</span>
    @error('superficie')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label>Etat</label><br>
    @foreach($neufOptions as $value => $label)
        <input type="radio" id="neuf_{{ $value }}" name="neuf" value="{{ $value }}"
            {{ (old('neuf', $annonce->neuf ?? '') == $value) ? 'checked' : '' }} />
        <label for="neuf_{{ $value }}">{{ $label }}</label>
    @endforeach
    @error('neuf')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3 input-group">
    <input value="{{ old('prix', $annonce->prix ?? '') }}"
        name="prix" type="number" placeholder="Prix"
        class="form-control @error('prix') is-invalid @enderror">
    <span class="input-group-text">DH</span>
    @error('prix')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="photo">Photo</label>
    <input name="photo" type="file" accept="image/*"
        class="form-control @error('photo') is-invalid @enderror">
    @error('photo')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    @if(isset($annonce) && $annonce->photo)
        <div class="mt-2">
            <p>Photo actuelle :</p>
            <img src="{{ asset('storage/' . $annonce->photo) }}"
                 alt="photo" width="150" class="rounded">
        </div>
    @endif
</div>