<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "Conexão com o banco de dados estabelecida com sucesso!";
    } catch (\Exception $e) {
        return "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
});

// Rotas de Autenticação
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () {
        // Se for admin OU superadmin, redireciona para dashboard admin
        if ((auth()->user()->role === 'admin' || auth()->user()->role === 'superadmin') && !session('view_as_user')) {
            return redirect()->route('admin.dashboard');
        }
        return view('dashboard');
    })->name('dashboard');

    // Rotas de admin protegidas por lógica na rota
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            if (!auth()->check() || (auth()->user()->role !== 'admin' && auth()->user()->role !== 'superadmin')) {
                abort(403, 'Acesso não autorizado.');
            }
            return app(\App\Http\Controllers\Admin\AdminDashboardController::class)->index();
        })->name('dashboard');

        Route::post('/users/{user}/delete', function ($user) {
            if (!auth()->check() || (auth()->user()->role !== 'admin' && auth()->user()->role !== 'superadmin')) {
                abort(403, 'Acesso não autorizado.');
            }
            return app(\App\Http\Controllers\Admin\UserManagementController::class)->destroy(\App\Models\User::findOrFail($user));
        })->name('users.destroy');

        Route::post('/users/{user}/promote', function ($user) {
            if (!auth()->check() || (auth()->user()->role !== 'admin' && auth()->user()->role !== 'superadmin')) {
                abort(403, 'Acesso não autorizado.');
            }
            return app(\App\Http\Controllers\Admin\UserManagementController::class)->promote(\App\Models\User::findOrFail($user));
        })->name('users.promote');

        Route::post('/users/{user}/demote', function ($user) {
            if (!auth()->check()) {
                abort(403, 'Acesso não autorizado.');
            }
            return app(\App\Http\Controllers\Admin\UserManagementController::class)->demote(\App\Models\User::findOrFail($user));
        })->name('users.demote');

        Route::post('/users/{user}/promote-superadmin', function ($user) {
            if (!auth()->check() || !(auth()->user()->isSuperAdmin() && auth()->id() == 1)) {
                abort(403, 'Acesso não autorizado.');
            }
            return app(\App\Http\Controllers\Admin\UserManagementController::class)->promoteToSuperAdmin(\App\Models\User::findOrFail($user));
        })->name('users.promoteSuperadmin');

        Route::post('/users/store', function (\Illuminate\Http\Request $request) {
            return app(\App\Http\Controllers\Admin\UserManagementController::class)->store($request);
        })->name('users.store');

        Route::get('/users/{user}/edit', function ($user) {
            if (!auth()->check() || (auth()->user()->role !== 'admin' && auth()->user()->role !== 'superadmin')) {
                abort(403, 'Acesso não autorizado.');
            }
            $user = \App\Models\User::findOrFail($user);
            return view('admin.edit-user', compact('user'));
        })->name('users.edit');

        Route::put('/users/{user}', function (\Illuminate\Http\Request $request, $user) {
            if (!auth()->check() || (auth()->user()->role !== 'admin' && auth()->user()->role !== 'superadmin')) {
                abort(403, 'Acesso não autorizado.');
            }
            return app(\App\Http\Controllers\Admin\UserManagementController::class)->update($request, \App\Models\User::findOrFail($user));
        })->name('users.update');
    });

    // Alternar visualização admin <-> usuário
    Route::post('/view-as-user', function () {
        session(['view_as_user' => true]);
        return redirect()->route('dashboard');
    })->name('viewAsUser');
    Route::post('/view-as-admin', function () {
        session()->forget('view_as_user');
        return redirect()->route('admin.dashboard');
    })->name('viewAsAdmin');

    Route::get('/profile/edit', function () {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    })->name('profile.edit');

    Route::post('/profile/edit', function (\Illuminate\Http\Request $request) {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:4|confirmed',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('profile.edit')->with('success', 'Perfil atualizado com sucesso!');
    })->name('profile.update');
});
