<?php
// Inizializziamo le variabili
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $op   = $_POST['operatore'];

    if (is_numeric($num1) && is_numeric($num2)) {
        switch ($op) {
            case '+': $result = $num1 + $num2; break;
            case '-': $result = $num1 - $num2; break;
            case '*': $result = $num1 * $num2; break;
            case '/': 
                $result = ($num2 != 0) ? $num1 / $num2 : 'Non si può dividere per 0';
                break;
            default:
                $result = 'Operatore non valido';
        }
    } else {
        $result = 'Inserisci numeri validi.';
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calcolatrice PHP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Calcolatrice PHP</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="num1" class="form-label">Primo numero</label>
                            <input type="number" step="any" class="form-control" id="num1" name="num1" required>
                        </div>

                        <div class="mb-3">
                            <label for="num2" class="form-label">Secondo numero</label>
                            <input type="number" step="any" class="form-control" id="num2" name="num2" required>
                        </div>

                        <div class="mb-3">
                            <label for="operatore" class="form-label">Operatore</label>
                            <select class="form-select" id="operatore" name="operatore" required>
                                <option value="+">Addizione (+)</option>
                                <option value="-">Sottrazione (-)</option>
                                <option value="*">Moltiplicazione (*)</option>
                                <option value="/">Divisione (/)</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Calcola</button>
                        </div>
                    </form>
                </div>

                <?php if ($result !== ''): ?>
                <div class="card-footer text-center">
                    <h5>Risultato: <span class="text-primary"><?= htmlspecialchars($result) ?></span></h5>
                </div>
                <?php endif; ?>

            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
