<!DOCTYPE html>
<html lang="en" class="dark">
    @include('layouts.head')
    <body class="  dark:bg-slate-800">
        @include('layouts.header')
        <main class="pt-24 pb-12 mx-20">
            <section class="mt-8 flex flex-col gap-8 items-center justify-evenly">
                <h1 class="text-2xl">Detalhes da Consulta</h1>
                <div class="w-full px-6 py-3 border-black rounded-xl border">
                    <p>Nome do paciente: <span>Rony Rústico</span></p>
                </div>
                <div class="w-full px-6 py-3 border-black rounded-xl border">
                    <p>Nome do médico: <span>Ronielson</span></p>
                </div>
                <div class="w-full px-6 py-3 border-black rounded-xl border">
                    <p>Horário da consulta: <span>21:30</span></p>
                </div>
                <div class="w-full px-6 py-3 border-black rounded-xl border">
                    <p>Data da consulta: <span>27/01/2006</span></p>
                </div>
                <div class="w-full h-fit px-6 py-3 border-black text-justify rounded-xl border">
                    <p>Diagnóstico: <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos officiis officia debitis ab nam praesentium accusamus sint eaque, a labore illo natus ipsum harum repellendus exercitationem iste suscipit molestias non.
                    Libero facere excepturi dolorum ipsum perferendis tempore unde maxime voluptatem? Labore quibusdam eveniet magnam odio praesentium cum placeat minima in ad, impedit velit mollitia sed, inventore ipsa dolores numquam. Cumque.
                    Perspiciatis dolores voluptas, optio commodi expedita nam doloribus iste aliquid dolore corrupti asperiores reprehenderit qui voluptate autem dolor quod nihil molestias modi debitis repellat sint culpa quia assumenda hic? Impedit.
                    At atque aspernatur quia? A, blanditiis repellendus! Quae sed aperiam atque iusto eaque repudiandae nisi. Error ratione eligendi, facilis laboriosam aut sequi? Ipsum doloremque natus perferendis amet quaerat ratione maiores.
                    Beatae alias quaerat inventore fugit? Cupiditate ratione labore iusto nemo temporibus expedita alias sunt consectetur, nihil at suscipit molestias. Iste illum accusamus ipsum dicta autem eum dolore minus deserunt exercitationem.</span></p>
                </div>
                <div class="w-full h-fit px-6 py-3 border-black text-justify rounded-xl border">
                    <p>Medicamentos: <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos officiis officia debitis ab nam praesentium accusamus sint eaque, a labore illo natus ipsum harum repellendus exercitationem iste suscipit molestias non.
                    Libero facere excepturi dolorum ipsum perferendis tempore unde maxime voluptatem? Labore quibusdam eveniet magnam odio praesentium cum placeat minima in ad, impedit velit mollitia sed, inventore ipsa dolores numquam. Cumque.
                    Perspiciatis dolores voluptas, optio commodi expedita nam doloribus iste aliquid dolore corrupti asperiores reprehenderit qui voluptate autem dolor quod nihil molestias modi debitis repellat sint culpa quia assumenda hic? Impedit.
                    At atque aspernatur quia? A, blanditiis repellendus! Quae sed aperiam atque iusto eaque repudiandae nisi. Error ratione eligendi, facilis laboriosam aut sequi? Ipsum doloremque natus perferendis amet quaerat ratione maiores.
                    Beatae alias quaerat inventore fugit? Cupiditate ratione labore iusto nemo temporibus expedita alias sunt consectetur, nihil at suscipit molestias. Iste illum accusamus ipsum dicta autem eum dolore minus deserunt exercitationem.</span></p>
                </div>
                
            </section>
        </main>
        @include('layouts.footer')
    </body>
</html>