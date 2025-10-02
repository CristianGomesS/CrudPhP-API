<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #333;
        }
        .header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="header">Novo livro criado!</div>
    <p>Um novo livro foi adicionado à estante:</p>
    <p><strong>Título:</strong> {{ $book->titulo }}</p>
    <p><strong>Autor:</strong> {{ $book->author->name ?? 'Desconhecido' }}</p>
    <p><strong>Editora:</strong> {{ $book->publisher->name ?? 'Desconhecido' }}</p>

    <p><a href="{{ url('/api/books/' . $book->id) }}" style="display: inline-block; background-color: #3498db; color: #fff; padding: 10px 15px; text-decoration: none; border-radius: 5px;">Ver Livro</a></p>

    <div class="footer">Obrigado por usar nosso sistema!</div>
</body>
</html>
