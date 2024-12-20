// Função para alternar o conteúdo principal
function updateContent(message) {
    const content = document.getElementById("content");
    content.classList.remove("fade-in");
    content.innerHTML = message;
    setTimeout(() => content.classList.add("fade-in"), 10);
  }
  
  // Adiciona animação e funcionalidade aos botões
  function setupButtonActions() {
    const buttons = [
      {
        id: "btnDashboard",
        action: () => updateContent("Bem-vindo ao sistema de gerenciamento!"),
      },
      {
        id: "btnProdutos",
        action: () =>
          updateContent(`
            <h2 class="text-xl font-bold text-gray-800 mb-4">Produtos</h2>
            <ul class="list-disc pl-6">
              <li>Renegate - R$ 75.500</li>
            </ul>
          `),
      },
      {
        id: "btnCategorias",
        action: () =>
          updateContent(`
            <h2 class="text-xl font-bold text-gray-800 mb-4">Categorias</h2>
            <ul class="list-disc pl-6">
              <li>Carros</li>
   
            </ul>
          `),
      },
      {
        id: "btnRelatorios",
        action: () =>
          updateContent(`
            <h2 class="text-xl font-bold text-gray-800 mb-4">Relatórios</h2>
            <p class="text-gray-700">Relatórios de vendas e desempenho estarão disponíveis em breve.</p>
          `),
      },
      {
        id: "btnSair",
        action: () => {
          const confirmExit = confirm("Tem certeza de que deseja sair?");
          if (confirmExit) {
            updateContent("Você saiu do sistema.");
            setTimeout(() => (window.location.href = "/"), 2000); // Redireciona para a página inicial
          }
        },
      },
    ];
  
    buttons.forEach(({ id, action }) => {
      const button = document.getElementById(id);
      if (button) {
        button.addEventListener("click", () => {
          action();
          button.classList.add("button-click");
          setTimeout(() => button.classList.remove("button-click"), 300);
        });
      }
    });
  }
  
  // Configura as ações dos botões ao carregar a página
  document.addEventListener("DOMContentLoaded", setupButtonActions);
  