<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrossel de Livros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .carousel-container {
            width: 80%;
            margin: 0 auto;
        }
        .book {
            padding: 10px;
            text-align: center;
        }
        .book img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .book h3 {
            font-size: 1.2em;
            margin: 10px 0 5px;
        }
        .book p {
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="carousel-container">
        <div class="book">
            <img src="https://via.placeholder.com/150" alt="Livro 1">
            <h3>Título do Livro 1</h3>
            <p>Autor do Livro 1</p>
        </div>
        <div class="book">
            <img src="https://via.placeholder.com/150" alt="Livro 2">
            <h3>Título do Livro 2</h3>
            <p>Autor do Livro 2</p>
        </div>
        <div class="book">
            <img src="https://via.placeholder.com/150" alt="Livro 3">
            <h3>Título do Livro 3</h3>
            <p>Autor do Livro 3</p>
        </div>
        <div class="book">
            <img src="https://via.placeholder.com/150" alt="Livro 4">
            <h3>Título do Livro 4</h3>
            <p>Autor do Livro 4</p>
        </div>
        <div class="book">
            <img src="https://via.placeholder.com/150" alt="Livro 5">
            <h3>Título do Livro 5</h3>
            <p>Autor do Livro 5</p>
        </div>
        <div class="book">
            <img src="https://via.placeholder.com/150" alt="Livro 6">
            <h3>Título do Livro 6</h3>
            <p>Autor do Livro 6</p>
        </div>
        <div class="book">
            <img src="https://via.placeholder.com/150" alt="Livro 7">
            <h3>Título do Livro 7</h3>
            <p>Autor do Livro 7</p>
        </div>
        <div class="book">
            <img src="https://via.placeholder.com/150" alt="Livro 8">
            <h3>Título do Livro 8</h3>
            <p>Autor do Livro 8</p>
        </div>
        <div class="book">
            <img src="https://via.placeholder.com/150" alt="Livro 9">
            <h3>Título do Livro 9</h3>
            <p>Autor do Livro 9</p>
        </div>
        <div class="book">
            <img src="https://via.placeholder.com/150" alt="Livro 10">
            <h3>Título do Livro 10</h3>
            <p>Autor do Livro 10</p>
        </div>
        <div class="book">
            <img src="https://via.placeholder.com/150" alt="Livro 11">
            <h3>Título do Livro 11</h3>
            <p>Autor do Livro 11</p>
        </div>
        <div class="book">
            <img src="https://via.placeholder.com/150" alt="Livro 12">
            <h3>Título do Livro 12</h3>
            <p>Autor do Livro 12</p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.carousel-container').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 6,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
</body>
</html>
