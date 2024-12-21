<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Gerenciamento</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../script/animations.js"></script>

  <style>
    /* Estilo adicional para transições */
    .hidden {
      display: none;
    }
    .fade-in {
      animation: fadeIn 1s forwards;
    }
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .button-click {
      animation: buttonClick 0.3s;
    }
    @keyframes buttonClick {
      from {
        transform: scale(1);
      }
      to {
        transform: scale(0.95);
      }
    }
  </style>
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-gray-200 flex flex-col">
      <div class="p-4 text-lg font-semibold border-b border-gray-700">
        Sistema de Gerenciamento
      </div>
      <nav class="flex-1 p-4">
        <ul class="space-y-2">
          <li>
            <a href="#" id="btnDashboard" class="block p-2 rounded hover:bg-gray-700">Dashboard</a>
          </li>
          <li>
            <a href="#" id="btnProdutos" class="block p-2 rounded hover:bg-gray-700">Produtos</a>
          </li>
          <li>
            <a href="#" id="btnCategorias" class="block p-2 rounded hover:bg-gray-700">Categorias</a>
          </li>
          <li>
            <a href="#" id="btnRelatorios" class="block p-2 rounded hover:bg-gray-700">Relatórios</a>
          </li>
        </ul>
      </nav>
      <div class="p-4 border-t border-gray-700">
        <button id="btnSair" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600">
          Sair
        </button>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <header class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Painel de Gerenciamento</h1>
      </header>
      <div id="content" class="fade-in">
        <canvas id="dashboardChart" width="400" height="200"></canvas>
      </div>
    </main>
  </div>
  <!-- Script para inicializar o gráfico -->
  <script>
    const ctx = document.getElementById('dashboardChart').getContext('2d');
    const dashboardChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
        datasets: [{
          label: 'Vendas Mensais',
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(75, 192, 192, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</body>
</html>

