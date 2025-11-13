@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 mt-10 rounded-2xl shadow-lg">
  <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
    Créer un article
  </h1>

  <form method="POST" action="{{ route('articles.store') }}" class="space-y-5">
    @csrf

    <!-- Titre -->
    <div>
      <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
        Titre
      </label>
      <input
        id="title"
        name="title"
        type="text"
        value="{{ old('title') }}"
        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        placeholder="Entrez le titre de l’article"
      >
      @error('title')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Slug -->
    <div>
      <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">
        Slug
      </label>
      <input
        id="slug"
        name="slug"
        type="text"
        value="{{ old('slug') }}"
        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        placeholder="Ex: mon-article-unique"
      >
      @error('slug')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Contenu -->
    <div>
      <label for="content" class="block text-sm font-medium text-gray-700 mb-1">
        Contenu
      </label>
      <textarea
        id="content"
        name="content"
        rows="6"
        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        placeholder="Écrivez le contenu de l’article..."
      >{{ old('content') }}</textarea>
      @error('content')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Bouton -->
    <div class="text-center">
      <button
        type="submit"
        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200"
      >
        Enregistrer
      </button>
    </div>
  </form>
</div>
@endsection
