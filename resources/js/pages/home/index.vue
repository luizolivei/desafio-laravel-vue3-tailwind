<script setup>
import Container from "@/components/layout/Container.vue";
</script>

<template>
    <Container>
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-orange-400 mb-4">Venha trabalhar na Borcelle</h1>
            <span class="text-xl">A Borcelle abriu um banco de talentos, cadastre-se já!</span>
        </header>

        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 md:col-span-8 lg:col-span-9">
                <section class="mb-12">
                    <p class="text-lg md:text-2xl font-semibold mb-4"><b>Borcelle online store</b> está em busca de novos talentos
                        para integrar nosso time de estrelas.</p>
                    <p class="text-md md:text-lg mb-2">Por que escolher a Borcelle? Aqui está o que oferecemos:</p>
                    <ul class="list-disc list-inside text-gray-700 ml-6">
                        <li>Frutas frescas, cookies, café, chá e energéticos disponíveis a qualquer momento, além de
                            pizza toda sexta-feira no nosso escritório;
                        </li>
                        <li>Happy hours, eventos de integração e team buildings frequentes;</li>
                        <li>Sem dress code: aqui você pode ser você e usar o que te deixa mais confortável;</li>
                        <li>Ambiente descontraído, cheio de desafios e campeonatos de videogame;</li>
                        <li>Rede de descanso para um respiro no meio da correria do dia;</li>
                        <li>Biblioteca com livros incríveis para todos se desenvolverem;</li>
                        <li>Massagem in company para relaxar;</li>
                        <li>Day off e presente de aniversário;</li>
                    </ul>
                </section>

                <section class="md:mb-12">
                    <h2 class="text-2xl font-semibold mb-4">Nossos Benefícios</h2>
                    <ul class="list-disc list-inside text-gray-700 ml-6">
                        <li>Benefícios Caju no valor fixo de R$1.600 por mês (alimentação, mobilidade, saldo livre e
                            auxílio home office);
                        </li>
                        <li>Plano de saúde Unimed ou Amil com abrangência nacional;</li>
                        <li>Plano odontológico Odontoprev;</li>
                        <li>Seguro de vida Metlife;</li>
                        <li>Wellhub para o seu bem-estar;</li>
                        <li>Keikein, uma plataforma de apoio psicológico;</li>
                        <li>Convênio com a farmácia Panvel;</li>
                        <li>Licença maternidade e paternidade estendida pelo Programa Empresa Cidadã;</li>
                        <li>Subsídio para desenvolvimento, com parceria com a Unico Skill, oferecendo diversas opções de
                            graduação, pós-graduação, idiomas e mentorias;
                        </li>
                        <li>Aulas de inglês particulares para liderança e especialistas de nível II para cima;</li>
                        <li>Parceria com a PetLove;</li>
                    </ul>
                </section>
            </div>

            <div class="col-span-12 md:col-span-4 lg:col-span-3">
                <div class="text-center mt-4 md:mt-12 border-2 rounded border-gray-400 p-4">
                    <p class="text-xl mb-4">Tem interesse em fazer parte do nosso time? Cadastre seu curriculo aqui</p>
                    <router-link to="/curriculo" class="bg-blue-600 text-white text-md md:text-md lg:text-lg py-2 px-4 rounded hover:bg-blue-700 transition duration-300">
                        Cadastrar curriculo
                    </router-link>
                </div>
                <div class="flex justify-center mt-10">
                    <img src="../../../images/great-place.svg" alt="Great Place" class="w-40">
                </div>
            </div>
        </div>
    </Container>
</template>

