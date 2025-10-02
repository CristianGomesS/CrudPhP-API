<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importar Arquivo</title>
</head>

<body>
    
    <h1>Importar Arquivo CSV</h1>

    <!-- Formulário para envio de arquivo -->
    <form action="{{ route('import.index') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="arquivo">Escolha o arquivo CSV:</label>
        <input type="file" name="arquivo" id="arquivo" accept=".csv" required>

        <button type="submit">Carregar Arquivo</button>
        
    </form>
    
</body>
</html>
