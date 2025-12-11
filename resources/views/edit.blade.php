<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f4f4f4;
        }

        .form-container {
            max-width: 500px;
            width: 100%;
            margin: auto;
            padding: 25px;
            border-radius: 10px;
            background: #ffffff;
            box-shadow: 0 0 15px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-top: 15px;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 14px;
            margin-top: 20px;
            background: #4f46e5;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 17px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #3b36c7;
        }

        a {
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            color: #4f46e5;
            font-size: 16px;
        }

        .image-preview img {
            margin-top: 12px;
            width: 100%;
            max-width: 160px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        /* 📱 Mobile Responsive */
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            .form-container {
                padding: 18px;
            }

            input, button {
                font-size: 15px;
                padding: 10px;
            }

            .image-preview img {
                max-width: 130px;
            }
        }

        /* 📱 Tablet Responsive */
        @media (max-width: 900px) {
            .form-container {
                max-width: 90%;
            }
        }
    </style>
</head>
<body>

    <a href="{{ route('fetch') }}">← Back to List</a>

    <div class="form-container">

        <h2>Edit Student</h2>

        <form action="{{ route('student.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Name</label>
            <input type="text" name="name" value="{{ $product->name }}" required>

            <label>Email</label>
            <input type="email" name="email" value="{{ $product->email }}" required>

            <label>Date of Birth</label>
            <input type="date" name="date_of_birth" value="{{ $product->date_of_birth }}" required>

            <label>Profile Picture</label>
            <input type="file" name="image">

            <div class="image-preview">
                @if($product->image)
                    <p>Current Image:</p>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image">
                @endif
            </div>

            <button type="submit">Update Student</button>

        </form>
    </div>

</body>
</html>
