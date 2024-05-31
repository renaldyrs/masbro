@extends('layouts.admin')

@section('content')
@include('layouts.partial.sidebar_admin')

<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <div class="bg-white dark:bg-zinc-800 min-h-screen">
    <header class="bg-blue-500 dark:bg-zinc-900 text-white py-4 px-6">
        <h1 class="text-2xl font-semibold">Dashboard Admnin</h1>
    </header>
    <main class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-zinc-100 dark:bg-zinc-700 p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold mb-2">Total Revenue</h2>
                <p class="text-2xl font-bold">$10,000</p>
            </div>
            <div class="bg-zinc-100 dark:bg-zinc-700 p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold mb-2">Expenses</h2>
                <p class="text-2xl font-bold">$5,000</p>
            </div>
            <div class="bg-zinc-100 dark:bg-zinc-700 p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold mb-2">Net Income</h2>
                <p class="text-2xl font-bold">$5,000</p>
            </div>
            <div class="bg-zinc-100 dark:bg-zinc-700 p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold mb-2">Profit Margin</h2>
                <p class="text-2xl font-bold">50%</p>
            </div>
        </div>
    </main>
</div>
  </body>
</html>

    @endsection
	@push('scripts')
	@include('layouts.partial.script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
	@endpush