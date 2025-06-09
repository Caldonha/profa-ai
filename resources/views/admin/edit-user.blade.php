<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário - PROFA.AI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-white min-h-screen">
    <nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center sticky top-0 z-10">
        <span class="text-2xl font-extrabold text-indigo-700 tracking-tight">Painel de Administração</span>
        <a href="{{ route('admin.dashboard') }}" class="text-indigo-600 hover:text-indigo-900 font-semibold transition">Voltar</a>
    </nav>
    <main class="flex flex-col items-center justify-center min-h-[80vh] px-4">
        <h1 class="text-3xl font-bold mb-8 text-gray-900">Editar Usuário</h1>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-6 shadow w-full max-w-md">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-2 rounded mb-6 shadow w-full max-w-md">
                {{ session('error') }}
            </div>
        @endif
        
        @if($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-2 rounded mb-6 shadow w-full max-w-md">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nome</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 outline-none transition">
            </div>
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 outline-none transition">
            </div>
            <div>
                <label for="role" class="block text-sm font-semibold text-gray-700 mb-1">Cargo</label>
                <select name="role" id="role" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 outline-none transition">
                    <option value="user" @if($user->role=='user') selected @endif>Usuário</option>
                    <option value="admin" @if($user->role=='admin') selected @endif>Admin</option>
                    <option value="superadmin" @if($user->role=='superadmin') selected @endif>Superadmin</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-800 text-white px-6 py-2 rounded-lg font-semibold shadow transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                    Salvar Alterações
                </button>
            </div>
        </form>
    </main>
</body>
</html> 