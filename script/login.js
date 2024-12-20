document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault(); // Previne o envio padrão do formulário

    const form = e.target;
    const formData = new FormData(form);

    try {
        const response = await fetch('login.php', {
            method: 'POST',
            body: formData,
        });

        const result = await response.json();

        if (result.error) {
            // Exibe o erro no frontend
            const errorElement = document.getElementById('error');
            errorElement.textContent = result.error;
            errorElement.classList.remove('hidden');
        } else {
            // Redireciona para o dashboard
            window.location.href = 'dashboard.php';
        }
    } catch (err) {
        console.error('Erro na solicitação:', err);
    }
});
