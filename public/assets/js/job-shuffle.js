class VagasDeEmprego {
    constructor() {
        this.vagas = [];
        this.detailsContainer = document.getElementById('job-details-container');
        this.jobContainer = document.getElementById('job-container');
        this.generateRandomVagas(10);
        this.inserirVagas();
    }

    
    shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    
    generateRandomVagas(numVagas) {
        
        const titulos = ["Engenheiro de Software", "Designer UX/UI", "Analista de Dados", "Desenvolvedor Web", "Gerente de Projeto", "Engenheiro de Dados", "Arquiteto de Software", "Cientista de Dados", "Analista de Sistemas", "Desenvolvedor Full Stack"];
        const empresas = ["Empresa A", "Empresa B", "Empresa C", "Empresa D", "Empresa E", "Empresa F", "Empresa G", "Empresa H", "Empresa I", "Empresa J"];
        const localizacoes = ["São Paulo, SP", "Rio de Janeiro, RJ", "Belo Horizonte, MG", "Porto Alegre, RS", "Curitiba, PR", "Salvador, BA", "Recife, PE", "Fortaleza, CE", "Brasília, DF", "Manaus, AM"];
        const descricoes = ["Lorem ipsum dolor sit amet, consectetur adipiscing elit.", "Praesent sit amet felis non lacus viverra rhoncus.", "Maecenas eget augue quis magna varius maximus.", "Fusce suscipit lectus non libero finibus.", "Aliquam nec quam id velit luctus facilisis.", "Nulla facilisi. Sed vitae nisi sit amet est porta vestibulum.", "In tempus magna eu turpis pulvinar malesuada.", "Etiam vestibulum ex ut elit ultricies, eget hendrerit turpis commodo.", "Suspendisse consequat est a magna ullamcorper, eget suscipit tortor tempor.", "Vestibulum maximus felis at sapien pellentesque, sit amet maximus justo scelerisque."];
        const tiposVaga = ["Estágio", "CLT", "PJ"];
        const requisitos = ["Graduação em Ciência da Computação ou áreas relacionadas.", "Experiência prévia em desenvolvimento web.", "Conhecimento avançado em Python e bibliotecas de aprendizado de máquina.", "Inglês avançado.", "Disponibilidade para viagens.", "Experiência com metodologias ágeis.", "Conhecimento em UX/UI.", "Certificação em segurança da informação.", "Experiência em liderança de equipes.", "Habilidade de comunicação interpessoal."];
        const beneficios = ["Plano de saúde", "Vale-refeição", "Vale-transporte", "Home office", "Seguro de vida", "Participação nos lucros", "Assistência odontológica", "Ginástica laboral", "Auxílio-creche", "Previdência privada"];
    
       
        const shuffledTitulos = this.shuffleArray(titulos);
        const shuffledEmpresas = this.shuffleArray(empresas);
        const shuffledLocalizacoes = this.shuffleArray(localizacoes);
        const shuffledDescricoes = this.shuffleArray(descricoes);
        const shuffledTiposVaga = this.shuffleArray(tiposVaga);
        const shuffledRequisitos = this.shuffleArray(requisitos);
        const shuffledBeneficios = this.shuffleArray(beneficios);
        
        this.vagas = [];

        
        for (let i = 0; i < numVagas; i++) {
            this.vagas.push({
                titulo: shuffledTitulos[i],
                empresa: shuffledEmpresas[i],
                localizacao: shuffledLocalizacoes[i],
                dataPublicacao: '01 de Janeiro de 2024', 
                descricao: shuffledDescricoes[i],
                tipoVaga: shuffledTiposVaga[i],
                requisitos: shuffledRequisitos[i],
                beneficios: shuffledBeneficios[i]
            });
        }
    }

    inserirVagas() {
        this.jobContainer.innerHTML = '';

        this.vagas.forEach((vaga, index) => {
            const divVaga = document.createElement('div');
            divVaga.classList.add('job-card');

            divVaga.setAttribute('data-index', index);

            const h2 = document.createElement('h2');
            h2.textContent = vaga.titulo;
            divVaga.appendChild(h2);

            const pEmpresa = document.createElement('p');
            pEmpresa.textContent = 'Empresa: ' + vaga.empresa;
            divVaga.appendChild(pEmpresa);

            const pLocalizacao = document.createElement('p');
            pLocalizacao.textContent = 'Localização: ' + vaga.localizacao;
            divVaga.appendChild(pLocalizacao);

            this.jobContainer.appendChild(divVaga);

            divVaga.addEventListener('click', () => {
                this.showDetails(index);
            });
        });
    }

    showDetails(index) {
        if (index < 0 || index >= this.vagas.length) {
            console.error('Índice de vaga inválido:', index);
            return;
        }
           
        const vaga = this.vagas[index];
        this.detailsContainer.innerHTML = '';
    
        const h2 = document.createElement('h1');
        h2.textContent = vaga.titulo;
    
        const pTipoVaga = document.createElement('h4');
        pTipoVaga.textContent = 'Tipo de Vaga: ' + vaga.tipoVaga;
    
        const pEmpresa = document.createElement('h4');
        pEmpresa.textContent = 'Empresa: ' + vaga.empresa;
    
        const pLocalizacao = document.createElement('h4');
        pLocalizacao.textContent = 'Localização: ' + vaga.localizacao;
        
    
        const pDataPublicacao = document.createElement('h4');
        pDataPublicacao.textContent = 'Data de Publicação: ' + vaga.dataPublicacao;
    
        const divDescricao = document.createElement('div');
        divDescricao.classList.add('description');
        const pDescricaoLabel = document.createElement('p');
        
        pDescricaoLabel.textContent = 'Descrição da vaga:';
        const pDescricao = document.createElement('p');
        pDescricao.textContent = vaga.descricao;
        divDescricao.appendChild(pDescricaoLabel);
        divDescricao.appendChild(pDescricao);
    
        const divRequisitos = document.createElement('div');
        divRequisitos.classList.add('requisitos');
        const pRequisitosLabel = document.createElement('p');
        pRequisitosLabel.textContent = 'Requisitos:';
        const pRequisitos = document.createElement('p');
        pRequisitos.textContent = vaga.requisitos;
        divRequisitos.appendChild(pRequisitosLabel);
        divRequisitos.appendChild(pRequisitos);
    
        const divBeneficios = document.createElement('div');
        divBeneficios.classList.add('beneficios');
        const pBeneficiosLabel = document.createElement('p');
        pBeneficiosLabel.textContent = 'Benefícios:';
        const pBeneficios = document.createElement('p');
        pBeneficios.textContent = vaga.beneficios;
        divBeneficios.appendChild(pBeneficiosLabel);
        divBeneficios.appendChild(pBeneficios);
    
        this.detailsContainer.appendChild(h2);
        this.detailsContainer.appendChild(pTipoVaga);
        this.detailsContainer.appendChild(pEmpresa);
        this.detailsContainer.appendChild(pLocalizacao);
        this.detailsContainer.appendChild(pDataPublicacao);
        this.detailsContainer.appendChild(divDescricao);
        this.detailsContainer.appendChild(divRequisitos);
        this.detailsContainer.appendChild(divBeneficios);
    }
}

const vagasDeEmprego = new VagasDeEmprego();
