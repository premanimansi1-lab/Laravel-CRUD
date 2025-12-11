<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Data</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 95%;
            margin: auto;
            padding: 10px 0;
        }

        .container a {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 15px;
            background-color: #4f46e5;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Table Wrapper for small screen scroll */
        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;
            min-width: 600px; /* maintain table structure on mobile */
            border-collapse: collapse;
            margin: 10px 0;
            font-size: 16px;
            text-align: left;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        img {
            max-width: 80px;
            height: auto;
            border-radius: 5px;
        }

        /* Mobile Screens */
        @media (max-width: 600px) {
            table {
                font-size: 14px;
            }

            th, td {
                padding: 8px;
            }

            .container a {
                padding: 8px 12px;
                font-size: 13px;
            }

            img {
                max-width: 60px;
            }
        }

        /* Tablet */
        @media (max-width: 900px) {
            table {
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">

        <a href="{{ route('dashboard') }}">+Add Students</a>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Profile Picture</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->email }}</td>
                        <td>{{ $product->date_of_birth }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Profile Picture">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <!-- Action buttons can be added here -->
                            <form action="{{ route('student.delete', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="padding: 5px 10px; background-color: red; color: white; border: none; border-radius: 4px; cursor: pointer;">Delete</button>
                            </form>
                            <a href="{{ route('student.edit', $product->id) }}" style="padding: 5px 10px; background-color: green; color: white; border: none; border-radius: 4px; cursor: pointer;">Edit</a>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>
