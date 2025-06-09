<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Administração - PROFA.AI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        @keyframes pulse-on-hover {
            0% { box-shadow: 0 0 0 0 rgba(124,58,237,0.3); }
            70% { box-shadow: 0 0 0 10px rgba(124,58,237,0.0); }
            100% { box-shadow: 0 0 0 0 rgba(124,58,237,0.0); }
        }
        .animate-pulse-on-hover:hover {
            animation: pulse-on-hover 0.7s;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-white min-h-screen">
    <nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center sticky top-0 z-10">
        <div class="flex items-center gap-4">
            <span class="text-2xl font-extrabold text-indigo-700 tracking-tight">PROFA.AI</span>
            <span class="ml-4 text-gray-600 text-sm hidden sm:inline">Logado como: <strong>{{ auth()->user()->name }}</strong> ({{ auth()->user()->email }})</span>
        </div>
        <div class="flex items-center gap-4">
            <form action="{{ route('viewAsUser') }}" method="POST">
                @csrf
                <button type="submit" class="text-indigo-600 hover:text-indigo-900 font-semibold transition">Visualizar como Usuário</button>
            </form>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-gray-600 hover:text-gray-900 font-semibold transition">Sair</button>
            </form>
        </div>
    </nav>
    <main class="max-w-5xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-2 text-gray-900">Usuários Registrados</h1>
        <p class="text-gray-500 mb-8 text-base">Adicione novos usuários ao sistema preenchendo os campos abaixo.</p>
        <div class="mb-10 bg-white/80 backdrop-blur-md rounded-2xl shadow-2xl p-8 flex flex-col md:flex-row md:items-end gap-6 border border-indigo-100">
            <form action="{{ route('admin.users.store') }}" method="POST" class="flex flex-col md:flex-row gap-4 w-full">
                @csrf
                <div class="flex-1">
                    <label for="name" class="block text-xs font-semibold text-gray-600 mb-1">Nome</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-indigo-400">
                            <i class="bi bi-person-vcard text-lg"></i>
                        </span>
                        <input type="text" name="name" id="name" required class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 outline-none transition bg-white/70 shadow-sm">
                    </div>
                </div>
                <div class="flex-1">
                    <label for="email" class="block text-xs font-semibold text-gray-600 mb-1">Email</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-indigo-400">
                            <i class="bi bi-envelope-at text-lg"></i>
                        </span>
                        <input type="email" name="email" id="email" required class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 outline-none transition bg-white/70 shadow-sm">
                    </div>
                </div>
                <div class="flex-1">
                    <label for="password" class="block text-xs font-semibold text-gray-600 mb-1">Senha</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-indigo-400">
                            <i class="bi bi-shield-lock text-lg"></i>
                        </span>
                        <input type="password" name="password" id="password" required class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 outline-none transition bg-white/70 shadow-sm">
                    </div>
                </div>
                <div class="flex-1">
                    <label for="role" class="block text-xs font-semibold text-gray-600 mb-1">Cargo</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-indigo-400">
                            <i class="bi bi-award text-lg"></i>
                        </span>
                        <select name="role" id="role" class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 outline-none transition bg-white/70 shadow-sm">
                            <option value="user">Usuário</option>
                            <option value="admin">Admin</option>
                            @if(auth()->user()->isSuperAdmin())
                                <option value="superadmin">Superadmin</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="flex items-center gap-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white px-7 py-3 rounded-xl font-bold shadow-lg transition-all duration-200 text-base focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:ring-offset-2 animate-pulse-on-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                        Adicionar Usuário
                    </button>
                </div>
            </form>
        </div>
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-6 shadow">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-2 rounded mb-6 shadow">{{ session('error') }}</div>
        @endif
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
            <div class="relative w-full md:w-1/3">
                <input type="text" id="searchInput" placeholder="Pesquisar por nome..." class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400 outline-none transition" onkeyup="filterTable()">
                <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"/></svg>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table id="usersTable" class="min-w-full bg-white rounded-xl shadow-lg">
                <thead class="bg-indigo-50">
                    <tr>
                        <!--<th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>-->
                        <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 uppercase">Nome</th>
                        <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 uppercase">Email</th>
                        <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 uppercase">Tipo</th>
                        <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 uppercase">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $isSuperAdmin = auth()->user()->isSuperAdmin();
                        $isMainSuperAdmin = $isSuperAdmin && auth()->id() == 1;
                        $isAdmin = auth()->user()->role === 'admin';
                    @endphp

                    @foreach($users as $user)
                        <tr class="hover:bg-indigo-50 transition">
                            <!--<td class="py-2 px-4 border-b border-gray-100">{{ $user->id }}</td>-->
                            <td class="py-2 px-4 border-b border-gray-100">{{ $user->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-100">{{ $user->email }}</td>
                            <td class="py-2 px-4 border-b border-gray-100 capitalize">
                                @if($user->role === 'superadmin')
                                    <span class="inline-block px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs font-bold">Superadmin</span>
                                @elseif($user->role === 'admin')
                                    <span class="inline-block px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs font-bold">Admin</span>
                                @else
                                    <span class="inline-block px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs font-bold">Usuário</span>
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b border-gray-100">
                                <div class="flex flex-wrap gap-2">
                                    @if($isMainSuperAdmin && $user->id != 1)
                                        @if($user->role === 'admin')
                                            <form action="{{ route('admin.users.demote', $user) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="flex items-center gap-1 bg-gray-200 hover:bg-gray-400 text-gray-800 px-4 py-1.5 rounded-lg font-semibold shadow-sm transition text-sm border border-gray-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13H5v-2h14v2z" /></svg>
                                                    Rebaixar para Usuário
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('admin.users.promoteSuperadmin', $user) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="flex items-center gap-1 bg-purple-200 hover:bg-purple-400 text-purple-900 px-4 py-1.5 rounded-lg font-semibold shadow-sm transition text-sm border border-purple-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                                    Promover a Superadmin
                                                </button>
                                            </form>
                                        @elseif($user->role === 'user')
                                            <form action="{{ route('admin.users.promote', $user) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="flex items-center gap-1 bg-blue-200 hover:bg-blue-400 text-blue-900 px-4 py-1.5 rounded-lg font-semibold shadow-sm transition text-sm border border-blue-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                                    Promover a Admin
                                                </button>
                                            </form>
                                        @elseif($user->role === 'superadmin')
                                            <form action="{{ route('admin.users.demote', $user) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="flex items-center gap-1 bg-purple-200 hover:bg-purple-400 text-purple-900 px-4 py-1.5 rounded-lg font-semibold shadow-sm transition text-sm border border-purple-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13H5v-2h14v2z" /></svg>
                                                    Rebaixar para Admin
                                                </button>
                                            </form>
                                        @endif
                                        <a href="{{ route('admin.users.edit', $user) }}" class="flex items-center gap-1 bg-yellow-300 hover:bg-yellow-400 text-yellow-900 px-4 py-1.5 rounded-lg font-semibold shadow-sm transition text-sm border border-yellow-200"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13h6m2 2a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v6z" /></svg>Editar</a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                                            @csrf
                                            <button type="submit" class="flex items-center gap-1 bg-red-100 hover:bg-red-300 text-red-700 px-4 py-1.5 rounded-lg font-semibold shadow-sm transition text-sm border border-red-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>Excluir</button>
                                        </form>
                                    @elseif($isSuperAdmin && !$isMainSuperAdmin && $user->role !== 'superadmin')
                                        @if($user->role === 'admin')
                                            <form action="{{ route('admin.users.demote', $user) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="flex items-center gap-1 bg-gray-200 hover:bg-gray-400 text-gray-800 px-4 py-1.5 rounded-lg font-semibold shadow-sm transition text-sm border border-gray-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13H5v-2h14v2z" /></svg>
                                                    Rebaixar para Usuário
                                                </button>
                                            </form>
                                        @elseif($user->role === 'user')
                                            <form action="{{ route('admin.users.promote', $user) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="flex items-center gap-1 bg-blue-200 hover:bg-blue-400 text-blue-900 px-4 py-1.5 rounded-lg font-semibold shadow-sm transition text-sm border border-blue-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                                    Promover a Admin
                                                </button>
                                            </form>
                                        @endif
                                        <a href="{{ route('admin.users.edit', $user) }}" class="flex items-center gap-1 bg-yellow-300 hover:bg-yellow-400 text-yellow-900 px-4 py-1.5 rounded-lg font-semibold shadow-sm transition text-sm border border-yellow-200"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13h6m2 2a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v6z" /></svg>Editar</a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                                            @csrf
                                            <button type="submit" class="flex items-center gap-1 bg-red-100 hover:bg-red-300 text-red-700 px-4 py-1.5 rounded-lg font-semibold shadow-sm transition text-sm border border-red-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>Excluir</button>
                                        </form>
                                    @elseif($isAdmin && $user->role === 'user')
                                        <a href="{{ route('admin.users.edit', $user) }}" class="flex items-center gap-1 bg-yellow-300 hover:bg-yellow-400 text-yellow-900 px-4 py-1.5 rounded-lg font-semibold shadow-sm transition text-sm border border-yellow-200"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13h6m2 2a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v6z" /></svg>Editar</a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                                            @csrf
                                            <button type="submit" class="flex items-center gap-1 bg-red-100 hover:bg-red-300 text-red-700 px-4 py-1.5 rounded-lg font-semibold shadow-sm transition text-sm border border-red-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>Excluir</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <script>
    function filterTable() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const table = document.getElementById('usersTable');
        const trs = table.getElementsByTagName('tr');
        for (let i = 1; i < trs.length; i++) {
            const td = trs[i].getElementsByTagName('td')[1];
            if (td) {
                const txtValue = td.textContent || td.innerText;
                trs[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? '' : 'none';
            }
        }
    }
    </script>
</body>
</html> 