<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Diet Recommendation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('background.jpg'); /* Replace 'background.jpg' with your actual image file */
            background-size: cover;
            background-position: center;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: #fff;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            outline: none;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Medical Diet Recommendation</h2>
    <form action="process_diet.php" method="post">
        <label for="age">Age:</label>
        <input type="text" id="age" name="age" required>

        <label for="weight">Weight (kg):</label>
        <input type="text" id="weight" name="weight" required>

        <label for="height">Height (cm):</label>
        <input type="text" id="height" name="height" required>

        <button type="submit">Get Diet Recommendation</button>
    </form>
</body>
</html>
