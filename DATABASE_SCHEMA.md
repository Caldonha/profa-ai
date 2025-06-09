# 🗄️ Modelagem do Banco - PROFA.AI

## 📊 Diagrama ER

```
┌─────────────────────────┐
│        USERS            │
├─────────────────────────┤
│ id (PK)                 │
│ name                    │
│ email (UNIQUE)          │
│ email_verified_at       │
│ password                │
│ role                    │
│ remember_token          │
│ created_at              │
│ updated_at              │
└─────────────────────────┘
```

## 🔐 Tabela: users

| Campo | Tipo | Restrições | Padrão |
|-------|------|------------|---------|
| `id` | BIGINT | PRIMARY KEY, AUTO_INCREMENT | |
| `name` | VARCHAR(255) | NOT NULL | |
| `email` | VARCHAR(255) | NOT NULL, UNIQUE | |
| `email_verified_at` | TIMESTAMP | NULL | NULL |
| `password` | VARCHAR(255) | NOT NULL | |
| `role` | VARCHAR(255) | NOT NULL | 'user' |
| `remember_token` | VARCHAR(100) | NULL | NULL |
| `created_at` | TIMESTAMP | NULL | NULL |
| `updated_at` | TIMESTAMP | NULL | NULL |

### Roles Disponíveis:
- `user` → Professor padrão
- `admin` → Administrador 
- `superadmin` → Super administrador

## 🛠️ SQL de Criação

```sql
CREATE TABLE users (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL DEFAULT 'user',
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

## 📝 Seeders Padrão

```php
// SuperAdmin
email: admin@admin.com
password: Admin
role: superadmin

// Admin  
email: admin@teste.com
password: admin123
role: admin

// User
email: test@example.com  
password: password
role: user
```

---

**Autor:** Vitor Hugo Caldonha Leme  
**Projeto:** PROFA.AI 