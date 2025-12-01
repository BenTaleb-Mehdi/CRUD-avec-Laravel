# 🔐 Sécurité & Accès — Blog Laravel (Tutoriel 3.2.1)

## 1️⃣ Zones principales du blog

Ce tableau liste toutes les zones du blog ainsi que leur type d’accès.

### **Zones du blog**

| Zone / Page                        | URL (exemple)                     | Type d’accès souhaité              |
|-----------------------------------|----------------------------------|------------------------------------|
| Accueil du blog                   | /                                | Public (tout le monde)            |
| Liste des articles                | /articles                        | Public (tout le monde)            |
| Page d’un article                 | /articles/{slug}                 | Public (tout le monde)            |
| Dashboard d’administration        | /admin                           | Réservé aux utilisateurs connectés |
| Création d’un article             | /admin/articles/create           | Réservé à certains rôles           |
| Modification d’un article         | /admin/articles/{id}/edit        | Réservé à certains rôles           |
| Suppression d’un article          | /admin/articles/{id}/delete      | Réservé à certains rôles           |


---

## 2️⃣ Rôles du blog

Voici les trois rôles définis pour gérer les permissions.

### **Rôles**

| Rôle      | Description |
|-----------|-------------|
| **Visiteur**  | Personne non connectée, peut uniquement lire les articles publics. |
| **Auteur**    | Utilisateur connecté, peut créer des articles et gérer **ses propres** articles. |
| **Admin**     | Responsable du blog, peut gérer tous les articles et administrer les utilisateurs. |


---

## 3️⃣ Qui a le droit de faire quoi ?

Le tableau ci-dessous représente les règles d’autorisation du blog.

### **Tableau Rôle × Action**

| Action / Rôle                     | Visiteur | Auteur | Admin |
|-----------------------------------|:--------:|:------:|:-----:|
| Lire les articles publics         | ✔️        | ✔️      | ✔️     |
| Accéder à /admin                  | ❌        | ✔️      | ✔️     |
| Créer un article                  | ❌        | ✔️      | ❌     |
| Modifier ses propres articles     | ❌        | ✔️      | ✔️     |
| Modifier n’importe quel article   | ❌        | ❌      | ✔️     |
| Supprimer ses propres articles    | ❌        | ✔️      | ✔️     |
| Supprimer n’importe quel article  | ❌        | ❌      | ✔️     |


---

## 4️⃣ Comment Laravel va gérer ça ?

Voici comment les règles métiers seront traduites en code :

- **Savoir qui est connecté**  
  → Authentification Laravel (Laravel UI).  
  Fournit login, logout et `Auth::user()`.

- **Empêcher les non connectés d’accéder à /admin**  
  → Middleware `auth` appliqué sur les routes d’administration.

- **Différencier Auteur / Admin**  
  → Champ `is_admin` dans la table `users`, accessible via `Auth::user()->is_admin`.

- **Contrôler précisément les actions (créer, modifier, supprimer)**  
  → Gates & Policies.  
  Exemple :  
  - "Un auteur peut modifier uniquement ses articles."  
  - "L’admin peut modifier et supprimer tous les articles."


---