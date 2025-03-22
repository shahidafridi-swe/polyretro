<div class="text-gray-300">
    <form method="POST" action="{{ route('retro.store') }}" class="max-w-lg mx-auto  p-6 rounded-lg shadow-lg">
        @csrf

        <input type="hidden" name="team_id" value="{{ $team->id }}">

        <label class="block text-gray-400 font-bold mb-2">Retro Name:</label>
        <input type="text" name="name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">



        <button type="submit" class="w-full mt-6 px-4 py-2 bg-cyan-800 text-white font-bold rounded-lg hover:bg-cyan-900">Create Retro</button>

    </form>
</div>

