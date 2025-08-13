<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | YourCompany</title>
    @vite('resources/css/app.css')
</head>

<body>

    {{-- Sidebar --}}
    <div class="sidebar">
        <div class="logo">
            <img src="https://logorevolution.id/wp-content/uploads/2021/11/raised-fist-fist-icon-6624189.png" alt="company_logo" class="w-12">
        </div>
        <ul>
            <li><a href="/admin/">Dashboard</a></li>
            <li><a href="/admin/categories">Categories</a></li>
            <li><a href="/admin/products">Products</a></li>
            <li><a href="/admin/employee">Employee</a></li>
            <li><a href="/admin/order">Order</a></li>
            <li><a href="/admin/tasks">Tasks</a></li>
            <!-- <li><a href=""></a></li> -->
            <!-- <li><a href=""></a></li> -->
        </ul>
    </div>
</body>

</html>