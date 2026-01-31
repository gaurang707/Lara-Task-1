# 🚀 Laravel 10 – Project & Task Management

A simple and scalable Laravel 10 application demonstrating clean architecture, Eloquent relationships, CRUD operations, DataTables, and API integration.

---

## ✨ Features

- 📁 **Project & Task Management**
  - Full CRUD operations for Projects and Tasks
  - Parent–child relationship handling

- 🔗 **Eloquent Relationships**
  - Project ➝ hasMany Tasks  
  - Task ➝ belongsTo Project

- 📊 **DataTables Integration**
  - Project listing using jQuery DataTable
  - Task listing using jQuery DataTable
  - Server-side friendly structure

- 🌐 **API Integration**
  - REST API endpoint:  
    - `GET /api/projects/{project}/tasks`
  - Tasks fetched via API and rendered in DataTable (Blade)

- 🔍 **Advanced Task Search**
  - Search and filter tasks by **Assignee**

- 🔐 **Role-Based Access Control**
  - Admin middleware applied
  - Only users with **viewer** role can access:
    - Project listing
    - Task listing

---

## 🧱 Tech Stack

- ⚙️ Laravel 10
- 🧩 Eloquent ORM
- 📊 Yajra DataTables
- 🌐 REST API
- 🎨 Blade Templates
- 🔐 Middleware & Role Checks

---

## ✅ Highlights

- Clean MVC structure
- Secure parent–child routing (`projects/{project}/tasks`)
- API-driven UI architecture
- Scalable and interview-ready design

---
