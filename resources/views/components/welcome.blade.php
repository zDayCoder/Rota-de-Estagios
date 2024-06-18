<div class="container-vagas position-fixed">
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
      

        <h1 class="mt-8 text-2xl font-medium text-gray-900">
            Bem-vindo a ROTA DE ESTAGIOS FATEC
        </h1>

        <p class="mt-33 text-gray-500 leading-relaxed">
            Bem-vindo ao REST - sua plataforma confiável para encontrar os melhores estagiários para sua empresa. Nosso
            objetivo é facilitar o processo de recrutamento, conectando empresas a talentos emergentes em um ambiente
            simples, poderoso e agradável. Acreditamos que contratar estagiários deveria ser uma experiência
            gratificante,
            por isso, dedicamos tempo para criar um ecossistema que seja um verdadeiro alívio. Esperamos que você
            aproveite
            essa jornada conosco.
        </p>
    </div>

    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
        <div>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    class="w-6 h-6 stroke-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
                <h2 class="ms-3 text-xl font-semibold text-gray-900">
                    <a href="{{ route('vacancy.create') }}">Crie sua primeira vaga</a>
                </h2>
            </div>

            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                Nossa plataforma oferece uma documentação completa para ajudá-lo a criar sua primeira vaga. Seja você
                novo
                ou experiente, recomendamos a leitura da documentação para aproveitar todas as funcionalidades
                disponíveis e
                facilitar o recrutamento.
            </p>

            <p class="mt-2 text-sm">
                <a href="{{ route('vacancy.create') }}" class="inline-flex items-center font-semibold text-indigo-700">
                    Crie sua Vaga agora!
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500">
                        <path fill-rule="evenodd"
                            d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </p>
        </div>


    </div>
</div>
