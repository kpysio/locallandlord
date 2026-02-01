@extends('public.layout')

@section('title', 'Welcome | Version v1')
@section('page_title', 'Welcome')

@section('content')
<div class="bg-gray-100">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Version Badge -->
    <div class="flex justify-end">
      <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-700 border border-indigo-200">Version: v1</span>
    </div>

    <!-- Hero / Business Details -->
    <div class="mt-4 bg-white rounded-lg shadow p-6">
      <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Business Details</h1>
      <p class="mt-3 text-gray-700">
        We are helping to find right and vetted tradesperson in your community to fix your problem without your presence.
        <a href="https://www.landlordstudio.com/uk/features/property-maintenance" target="_blank" rel="noopener" class="text-indigo-600 hover:text-indigo-700 underline">Learn more</a>
      </p>
      <p class="mt-2 text-gray-700">
        We are vertting Tradepersoon in your local area get quote and fix your problem without any hesitate.
      </p>
    </div>

    <!-- Key Features -->
    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="bg-white rounded-lg shadow p-5">
        <h3 class="text-lg font-semibold text-gray-900">Manage your Properties</h3>
        <p class="mt-2 text-sm text-gray-600">Keep all your properties organized in one place.</p>
      </div>
      <div class="bg-white rounded-lg shadow p-5">
        <h3 class="text-lg font-semibold text-gray-900">Manage your complienace dates</h3>
        <p class="mt-2 text-sm text-gray-600">Never miss important compliance deadlines.</p>
      </div>
      <div class="bg-white rounded-lg shadow p-5">
        <h3 class="text-lg font-semibold text-gray-900">Manger your your jobs</h3>
        <p class="mt-2 text-sm text-gray-600">Track maintenance jobs from request to completion.</p>
      </div>
      <div class="bg-white rounded-lg shadow p-5">
        <h3 class="text-lg font-semibold text-gray-900">Find best trades person for your job</h3>
        <p class="mt-2 text-sm text-gray-600">Discover vetted tradespeople matched to your needs.</p>
      </div>
    </div>

    <!-- CTA -->
    <div class="mt-6 bg-white rounded-lg shadow p-6">
      <p class="text-gray-800">
        Register Landloard and to find vetted Trades person based their reviews.
      </p>
      <div class="mt-4">
        <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">Register as Landlord</a>
      </div>
    </div>
  </div>
</div>
@endsection