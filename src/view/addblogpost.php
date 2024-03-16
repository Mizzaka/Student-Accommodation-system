<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./style/style.css">
<title>Post your Ad</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        color: #34CC33;
        text-align: center;
    }
    form {
        margin-top: 20px;
    }
    label {
        font-weight: bold;
    }
    input[type="text"],
    input[type="tel"],
    input[type="number"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }
    input[type="text"]:focus,
    input[type="tel"]:focus,
    input[type="number"]:focus,
    select:focus,
    textarea:focus {
        border-color: #FDC825;
    }
    input[type="submit"] {
        background-color: #34CC33;
        color: #fff;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        font-weight: bold;
        max-width: max-content;
        padding: 12px 28px;
        margin: 0 auto;
        display: block;
    }
    input[type="submit"]:hover {
        background-color: #ff7e00;
        border-color: #ff7e00;
        transition: 0.2s ease;
    }
    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        margin-bottom: 10px;
    }
    .file-input-wrapper input[type="file"] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }
    .file-input-label {
        padding: 10px 20px;
        background-color: #34CC33;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .file-input-label:hover {
        background-color: #ff7e00;
    }
    .image-section {
        display: inline;
        justify-content: space-between;
    }
    .image-box {
        
        border: 2px dashed #ccc;
        border-radius: 5px;
        padding: 70px;
        text-align: center;
        margin: 10px;
        margin-top: 40px;
    }
    .image-box img {
        max-width: 100%;
        max-height: 100%;
        margin-bottom: 10px;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Post your Blog</h2>
    <form action="../controller/addBlogController.php" method="post" enctype="multipart/form-data">
        <div class="image-section">
            <div class="image-box">
                <label for="photos1" class="file-input-label">Upload Image 1</label>
                <input type="file" id="photos1" name="blogimage" accept="image/*" style="display: none;">
                <div id="preview1" class="image-preview"></div>
            </div>
        
         
        <br><br><br>
        <label for="location">Title:</label>
        <input type="text" id="location" name="title" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="5" required style="resize: none;"></textarea>
        <input type="submit" value="Post my Blog" name="addpost">
    </form>
</div>
<script>
    const fileInputs = document.querySelectorAll('input[type="file"]');
    const previews = document.querySelectorAll('.image-preview');

    fileInputs.forEach((input, index) => {
        input.addEventListener('change', function() {
            const files = this.files;
            previews[index].innerHTML = '';
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const img = document.createElement('img');
                        img.src = event.target.result;
                        previews[index].appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    });
</script>
</body>
</html>
