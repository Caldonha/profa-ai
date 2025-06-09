<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function destroy(User $user): RedirectResponse
    {
        // Não permitir que o admin exclua um superadmin
        if ($user->role === 'superadmin') {
            // Só o superadmin de ID 1 pode excluir outros superadmins
            if (!(auth()->user()->isSuperAdmin() && auth()->id() == 1)) {
                return back()->with('error', 'Apenas o superadmin principal pode excluir outros superadmins!');
            }
            // Não permitir excluir a si mesmo
            if (auth()->id() === $user->id) {
                return back()->with('error', 'Você não pode excluir a si mesmo.');
            }
        } else {
            // Não permitir que o admin exclua a si mesmo
            if (auth()->id() === $user->id) {
                return back()->with('error', 'Você não pode excluir a si mesmo.');
            }
        }
        $user->delete();
        return back()->with('success', 'Usuário excluído com sucesso!');
    }

    public function promote(User $user): RedirectResponse
    {
        $user->role = 'admin';
        $user->save();
        return back()->with('success', 'Usuário promovido a admin!');
    }

    public function demote(User $user): RedirectResponse
    {
        // Não permitir rebaixar a si mesmo
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Você não pode rebaixar a si mesmo.');
        }

        // Se o usuário for admin, qualquer superadmin pode rebaixar para usuário
        if ($user->role === 'admin') {
            if (!auth()->user()->isSuperAdmin()) {
                abort(403, 'Acesso não autorizado.');
            }
            $user->role = 'user';
            $user->save();
            return back()->with('success', 'Admin rebaixado para usuário comum!');
        }

        // Se o usuário for superadmin, só o superadmin de ID 1 pode rebaixar para admin
        if ($user->role === 'superadmin') {
            if (!(auth()->user()->isSuperAdmin() && auth()->id() == 1)) {
                abort(403, 'Acesso não autorizado.');
            }
            $user->role = 'admin';
            $user->save();
            return back()->with('success', 'Superadmin rebaixado para admin!');
        }

        // Caso tente rebaixar um usuário comum, não faz nada
        return back()->with('error', 'Não é possível rebaixar este usuário.');
    }

    public function promoteToSuperAdmin(User $user): RedirectResponse
    {
        // Só superadmin pode promover
        if (!auth()->user()->isSuperAdmin()) {
            abort(403, 'Acesso não autorizado.');
        }
        $user->role = 'superadmin';
        $user->save();
        return back()->with('success', 'Usuário promovido a superadmin!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
            'role' => 'required|in:user,admin,superadmin',
        ]);

        // Só superadmin pode criar superadmin
        if ($request->role === 'superadmin' && !auth()->user()->isSuperAdmin()) {
            return back()->with('error', 'Apenas superadmin pode criar outro superadmin!');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return back()->with('success', 'Usuário criado com sucesso!');
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin,superadmin',
        ]);

        // Verificar permissões de role
        if ($request->role === 'superadmin') {
            // Só superadmin pode definir/alterar para superadmin
            if (!auth()->user()->isSuperAdmin()) {
                return back()->with('error', 'Apenas superadmin pode definir outro superadmin!');
            }
        }

        // Não permitir que o usuário altere seu próprio role
        if (auth()->id() === $user->id && $request->role !== $user->role) {
            return back()->with('error', 'Você não pode alterar seu próprio cargo!');
        }

        // Atualizar os dados do usuário
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Usuário atualizado com sucesso!');
    }
} 