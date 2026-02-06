@extends('layouts.app')

@section('title', 'Studenti')
@section('page_title', 'Popis studenata')

@section('content')

@if(session('uspjeh'))
  <div class="uspjeh">{{ session('uspjeh') }}</div>
@endif

<a class="btn" href="{{ route('studenti.create') }}">+ Novi student</a>

<table style="margin-top: 1rem;">
  <tr>
    <th>ID</th>
    <th>Ime</th>
    <th>Prezime</th>
    <th>Datum rođenja</th>
    <th>MBR</th>
    <th>Stipendija</th>
    <th>Mjesto</th>
    <th>Fakultet</th>
    <th>Akcije</th>
  </tr>

  @foreach($studenti as $s)
    <tr>
      <td>{{ $s->id }}</td>
      <td>{{ $s->ime }}</td>
      <td>{{ $s->prezime }}</td>
      <td>{{ optional($s->datum_rod)->format('d.m.Y') }}</td>
      <td>{{ $s->mbr }}</td>
      <td>{{ number_format($s->stipendija, 2, ',', '.') }}</td>
      <td>{{ $s->mjesto }}</td>
      <td>{{ $s->fakultet?->naziv }}</td>
      <td>
        <a href="{{ route('studenti.show', $s) }}">Prikaži</a> |
        <a href="{{ route('studenti.edit', $s) }}">Uredi</a> |
        <form action="{{ route('studenti.destroy', $s) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Obrisati?')">Obriši</button>
        </form>
      </td>
    </tr>
  @endforeach
</table>

@endsection
