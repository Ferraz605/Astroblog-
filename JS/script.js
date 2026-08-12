document.addEventListener("DOMContentLoaded", () => {
    
    // --- 1. FILTRO DE POSTAGENS (BLOG) ---
    const botoesFiltro = document.querySelectorAll(".filtro-btn");
    const postagens = document.querySelectorAll(".postagem");

    if (botoesFiltro.length > 0) {
        botoesFiltro.forEach(botao => {
            botao.addEventListener("click", () => {
                const filtro = botao.dataset.filtro;

                botoesFiltro.forEach(b => {
                    b.classList.remove("btn-filtro-ativo");
                    b.classList.add("btn-filtro-outline");
                });

                botao.classList.remove("btn-filtro-outline");
                botao.classList.add("btn-filtro-ativo");

                postagens.forEach(postagem => {
                    const tipo = postagem.dataset.tipo;
                    if (filtro === "todos" || tipo === filtro) {
                        postagem.style.display = "";
                    } else {
                        postagem.style.display = "none";
                    }
                });
            });
        });
    }

    // --- 2. BUSCA EM TABELAS (USUÁRIOS, EQUIPAMENTOS, ETC.) ---
    const inputsBusca = document.querySelectorAll(".input-busca-astro");

    inputsBusca.forEach(inputBusca => {
        inputBusca.addEventListener("input", () => {
            const termo = inputBusca.value.toLowerCase().trim();
            const containerCard = inputBusca.closest(".container");
            
            if (containerCard) {
                const linhasTabela = containerCard.querySelectorAll("tbody tr");
                linhasTabela.forEach(linha => {
                    const textoLinha = linha.textContent.toLowerCase();
                    if (textoLinha.includes(termo)) {
                        linha.style.display = "";
                    } else {
                        linha.style.display = "none";
                    }
                });
            }
        });
    });

});