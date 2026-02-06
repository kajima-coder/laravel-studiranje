@extends('layouts.app')

@section('title', 'Uredi studenta')
@section('page_title', 'Uredi studenta')

@section('content')

<form class="form-box" method="POST" action="{{ route('studenti.update', $student) }}">
  @csrf
  @method('PUT')

  <label>Ime</label>
  <input type="text" name="ime" value="{{ old('ime', $student->ime) }}">

  <label>Prezime</label>
  <input type="text" name="prezime" value="{{ old('prezime', $student->prezime) }}">

  <label>Datum rođenja</label>
  <input type="date" name="datum_rod" value="{{ $student->datum_rod->format('Y-m-d') }}">

  <label>MBR</label>
  <input type="number" name="mbr" value="{{ $student->mbr }}">

  <label>Stipendija</label>
  <input type="number" step="0.01" name="stipendija" value="{{ $student->stipendija }}">

  <label>Mjesto</label>
  <input type="text" name="mjesto" value="{{ $student->mjesto }}">

  <label>Fakultet</label>
  <select name="fakultetid">
    @foreach($fakulteti as $f)
      <option value="{{ $f->id }}" @selected($student->fakultetid == $f->id)>
        {{ $f->naziv }}
      </option>
    @endforeach
  </select>

  <button type="submit">Spremi</button>
</form>

@endsection
